@extends('layouts.dashboard')

@section('title', 'Kategori | '.env('APP_NAME'))

@section('content')
<div class="row">
    <h3 class="my-16">Blog / Kategori</h3>
    <div class="col">
        <div class="card card-body">
            <div class="col">
                <div class="row justify-content-between my-10 gap-10 px-0">
                    <div class="row mx-md-0 col-auto mx-auto gap-10">
                        @can('blog-store')
                        <button class="btn btn-primary col col-sm-auto add-modal-kategori"><i class="ri-add-line remix-icon"></i><span>Tambah Kategori</span></button>
                        @endcan
                    </div>
                    <div class="mx-md-0 col-auto mx-auto">
                        <div class="input-group align-items-center">
                            <span class="input-group-text hp-bg-dark-100 border-end-0 pe-0 bg-white">
                                <i class="iconly-Light-Search text-black-80" style="font-size: 16px;"></i>
                            </span>
                            <input class="form-control border-start-0 ps-8" id="search_kategori" name="search_kategori" type="text" value="" placeholder="Search Kategori">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table-hover table-borderless table align-middle">
                        <thead id="thead_kategori">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th class="text-center">Gambar</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_kategori">
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <nav class="col-12 col-sm-auto text-center pagination_kategori" aria-label="Page navigation example">
                    </nav>
                    <br>
                    <p class="kategori_entry"></p>
                </div>
            </div>
        </div>
    </div>
    @section('modal')
    <div class="modal fade" id="modalKategori" aria-labelledby="modalKategori" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formKategori">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalKategoriTitleLabel">Tambah Kategori</h5>
                        <button class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" type="button" aria-label="Close">
                            <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                        </button>
                    </div>
                    <div class="modal-body body-kategori">
                        <input class="id" id="id" name="id" type="text" hidden>
                        <div class="form-group mb-12">
                            <label for="nama">Nama</label>
                            <input class="form-control nama" id="nama" name="nama" type="text" placeholder="Nama" required>
                        </div>
                        <div class="form-group mb-12">
                            <label class="control-label">Gambar</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="gambar_lfm" data-input="gambar" data-preview="holder" class="btn btn-primary" style="border-radius: 0px !important;">
                                        <i class="fa fa-picture-o"></i> Pilih Gambar
                                    </a>
                                </span>
                                <input id="gambar" class="form-control gambar" type="text" name="gambar" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @can('blog-store')
                        <button class="btn btn-primary btn-save-kategori" type="submit"><i class="icofont icofont-plus"></i> Tambah</button>
                        @endcan
                        @can('blog-update')
                        <button class="btn btn-primary btn-edit-kategori" type="submit"><i class="icofont icofont-pencil"></i> Edit</button>
                        @endcan
                        @can('blog-destroy')
                        <button class="btn btn-danger btn-delete-kategori" type="button" data-id="0"><i class="icofont icofont-trash"></i> Hapus</button>
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
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    @canany(['blog-store', 'blog-update'])
    $('#formKategori').unbind('submit');
    @endcanany
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        loadKategori(1)
    })

    function pageKategori(totalPages, visiblePages){
        $(".pagination_kategori").twbsPagination({
            totalPages: totalPages,
            visiblePages: visiblePages,
            paginationClass: 'pagination justify-content-center mr-6',
            pageClass: 'kategoriPageLink',
            onPageClick: function (event, p) {
                loadKategori(p);
            }
        });
    }

    function loadKategori(page, search){
        search = $('#search_kategori').val()
        $.ajax({
            type: 'get',
            url: '{{ route("dashboard.kategori-blog.data") }}',
            data: {
                'search': search,
                'page': page
            },
            success: function(res) {
                var entry = `
                Menampilkan ${res.data.from} sampai ${res.data.to} dari ${res.data.total} entri
                `
                $('.kategori_entry').text(entry)

                if(res.data.total > 50){
                    pageKategori(res.data.last_page, 5)
                } else {
                    pageKategori(res.data.last_page, res.data.last_page)
                }
                let data = '';
                if(res.data.data.length > 0){
                    var urutan = (res.data.current_page-1)*10
                    $.each(res.data.data, (k, v) => {
                        data += `<tr>
                        <td scope="row">${urutan+(++k)}</td>
                        <td>${v.nama}</td>
                        <td class="text-center"><img src="${v.gambar}" style="max-width: 200px!important;height: auto"></td>
                        <td class="text-center">
                        <button class="btn btn-sm btn-primary detail-kategori" title="Detail" data-id="${v.id}"><i class="icofont icofont-gear"></i></button>
                        </td>
                        </tr>`;
                    });
                    $('#tbody_kategori').html(data);
                } else {
                    data = `
                    <tr>
                    <td class="text-center" colspan="${$('#thead_kategori th').length}">Data Kosong</td>
                    </tr>
                    `
                    $('#tbody_kategori').html(data);
                    $('.kategori_entry').empty()
                }
            },
            error: function(request, status, error) {
                let errorData = JSON.parse(request.responseText);
            }
        });
    }

    $('#search_kategori').keyup(delay(function (e) {
        let search_kategori = $(this).val();
        $(".pagination_kategori").twbsPagination('destroy');
        loadKategori(1, search_kategori)
    }, 250))

    $('.add-modal-kategori').on('click', function() {
        $('.btn-save-kategori').show()
        $('.btn-edit-kategori').hide()
        $('.btn-delete-kategori').attr('data-id', 0);
        $('.btn-delete-kategori').hide()
        $('#formKategori').trigger('reset')
        $('#modalKategoriTitle').html('Tambah Kategori')
        $('#modalKategori').modal('show');
    })

    $('body').on('click', '.detail-kategori', function () {
        var id = $(this).data('id');
        $.get("{{ route('dashboard.kategori-blog.show', ':id') }}".replace(':id', id), function (res) {
            $('.id').val(res.data.id)
            $('.nama').val(res.data.nama)
            $('.gambar').val(res.data.gambar)
            $('#modalKategoriTitle').html('Edit Kategori')
            $('.btn-save-kategori').hide()
            $('.btn-delete-kategori').attr('data-id', res.data.id);
            $('.btn-edit-kategori').show()
            $('.btn-delete-kategori').show()
            $('#modalKategori').modal('show');
        })
    })

    $('#formKategori').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            data: $(this).serialize(),
            url: "{{ route('dashboard.kategori-blog.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $(this).trigger("reset");
                $('#modalKategori').modal('hide');
                swal("Success...", data.message, "success")
                loadKategori(1)
            },
            error: function (data) {
                swal("Error...", data.message, "error")
            }
        });
    })

    $('.btn-delete-kategori').on('click', function(){
        var id = $(this).data('id');
        $.ajax({
            type: "DELETE",
            url: "{{ route('dashboard.kategori-blog.destroy', ':id') }}".replace(':id', id),
            success: function (data) {
                $(this).trigger("reset");
                $('#modalKategori').modal('hide');
                swal("Success...", data.message, "success")
                loadKategori(1)
            },
            error: function (data) {
                swal("Error...", data.message, "error")
            }
        });
    })

    var route_prefix = "/dashboard/filemanager";
    $('#gambar_lfm').filemanager('image', {prefix: route_prefix});
</script>
@endsection