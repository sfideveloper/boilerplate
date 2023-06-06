@extends('layouts.dashboard')

@section('title', 'Crud | '.env('APP_NAME'))

@section('content')
<div class="row">
    <h3 class="my-16">Crud</h3>
    <div class="col">
        <div class="card card-body">
            <div class="col">
                <div class="row justify-content-between my-10 gap-10 px-0">
                    <div class="row mx-md-0 col-auto mx-auto gap-10">
                        @can('crud-store')
                        <button class="btn btn-primary col col-sm-auto add-modal-crud"><i class="ri-add-line remix-icon"></i><span>Tambah Crud</span></button>
                        @endcan
                    </div>
                    <div class="mx-md-0 col-auto mx-auto">
                        <div class="input-group align-items-center">
                            <span class="input-group-text hp-bg-dark-100 border-end-0 pe-0 bg-white">
                                <i class="iconly-Light-Search text-black-80" style="font-size: 16px;"></i>
                            </span>
                            <input class="form-control border-start-0 ps-8" id="search_crud" name="search_crud" type="text" value="" placeholder="Search Crud">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-hover table-borderless table align-middle">
                        <thead id="thead_crud">
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_crud">
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <nav class="col-12 col-sm-auto text-center pagination_crud" aria-label="Page navigation example">
                    </nav>
                    <br>
                    <p class="crud_entry"></p>
                </div>
            </div>
        </div>
    </div>
    @section('modal')
    <div class="modal fade" id="modalCrud" aria-labelledby="modalCrud" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formCrud">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCrudTitleLabel">Tambah Judul</h5>
                        <button class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" type="button" aria-label="Close">
                            <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                        </button>
                    </div>
                    <div class="modal-body body-crud">
                        <input class="id" id="id" name="id" type="text" hidden>
                        <div class="form-group mb-12">
                            <label for="judul">Judul</label>
                            <input class="form-control judul" id="judul" name="judul" type="text" placeholder="Judul" required>
                        </div>
                        <div class="form-group mb-12">
                            <label for="deskripsi">Deskripsi</label>
                            <input class="form-control deskripsi" id="deskripsi" name="deskripsi" type="text" placeholder="Deskripsi" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @can('crud-store')
                        <button class="btn btn-primary btn-save-crud" type="submit"><i class="icofont icofont-plus"></i> Tambah</button>
                        @endcan
                        @can('crud-update')
                        <button class="btn btn-primary btn-edit-crud" type="submit"><i class="icofont icofont-pencil"></i> Edit</button>
                        @endcan
                        @can('crud-destroy')
                        <button class="btn btn-danger btn-delete-crud" type="button" data-id="0"><i class="icofont icofont-trash"></i> Hapus</button>
                        @endcan
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
</div>
@endsection

@section('js')
<script src="{{asset('app-assets/js/pagination/pagination.js')}}"></script>
<script>
    @canany(['crud-store', 'crud-update'])
    $('#formCrud').unbind('submit');
    @endcanany
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        loadCrud(1)
    })

    function pageCrud(totalPages, visiblePages){
        $(".pagination_crud").twbsPagination({
            totalPages: totalPages,
            visiblePages: visiblePages,
            paginationClass: 'pagination justify-content-center mr-6',
            pageClass: 'crudPageLink',
            onPageClick: function (event, p) {
                loadCrud(p);
            }
        });
    }

    function loadCrud(page, search){
        search = $('#search_crud').val()
        $.ajax({
            type: 'get',
            url: '{{ route("dashboard.crud.data") }}',
            data: {
                'search': search,
                'page': page
            },
            success: function(res) {
                var entry = `
                Menampilkan ${res.data.from} sampai ${res.data.to} dari ${res.data.total} entri
                `
                $('.crud_entry').text(entry)

                if(res.data.total > 50){
                    pageCrud(res.data.last_page, 5)
                } else {
                    pageCrud(res.data.last_page, res.data.last_page)
                }
                let data = '';
                if(res.data.data.length > 0){
                    var urutan = (res.data.current_page-1)*10
                    $.each(res.data.data, (k, v) => {
                        data += `<tr>
                        <td scope="row">${urutan+(++k)}</td>
                        <td>${v.judul}</td>
                        <td>${v.deskripsi}</td>
                        <td class="text-center">
                        <button class="btn btn-sm btn-primary detail-crud" title="Detail" data-id="${v.id}"><i class="icofont icofont-gear"></i></button>
                        </td>
                        </tr>`;
                    });
                    $('#tbody_crud').html(data);
                } else {
                    data = `
                    <tr>
                    <td class="text-center" colspan="${$('#thead_crud th').length}">Data Kosong</td>
                    </tr>
                    `
                    $('#tbody_crud').html(data);
                    $('.crud_entry').empty()
                }
            },
            error: function(request, status, error) {
                let errorData = JSON.parse(request.responseText);
            }
        });
    }

    $('#search_crud').keyup(delay(function (e) {
        let search_crud = $(this).val();
        $(".pagination_crud").twbsPagination('destroy');
        loadCrud(1, search_crud)
    }, 250))

    $('.add-modal-crud').on('click', function() {
        $('.btn-save-crud').show()
        $('.btn-edit-crud').hide()
        $('.btn-delete-crud').attr('data-id', 0);
        $('.btn-delete-crud').hide()
        $('#formCrud').trigger('reset')
        $('#modalCrudTitle').html('Tambah Crud')
        $('#modalCrud').modal('show');
    })

    $('body').on('click', '.detail-crud', function () {
        var id = $(this).data('id');
        $.get("{{ route('dashboard.crud.show', ':id') }}".replace(':id', id), function (res) {
            $('.id').val(res.data.id)
            $('.judul').val(res.data.judul)
            $('.deskripsi').val(res.data.deskripsi)
            $('#modalCrudTitle').html('Edit Crud')
            $('.btn-save-crud').hide()
            $('.btn-delete-crud').attr('data-id', res.data.id);
            $('.btn-edit-crud').show()
            $('.btn-delete-crud').show()
            $('#modalCrud').modal('show');
        })
    })

    $('#formCrud').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            data: $(this).serialize(),
            url: "{{ route('dashboard.crud.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $(this).trigger("reset");
                $('#modalCrud').modal('hide');
                swal("Success...", data.message, "success")
                loadCrud(1)
            },
            error: function (data) {
                swal("Error...", data.message, "error")
            }
        });
    })

    $('.btn-delete-crud').on('click', function(){
        var id = $(this).data('id');
        $.ajax({
            type: "DELETE",
            url: "{{ route('dashboard.crud.destroy', ':id') }}".replace(':id', id),
            success: function (data) {
                $(this).trigger("reset");
                $('#modalCrud').modal('hide');
                swal("Success...", data.message, "success")
                loadCrud(1)
            },
            error: function (data) {
                swal("Error...", data.message, "error")
            }
        });
    })
</script>
@endsection