@extends('layouts.dashboard')

@section('title', 'Role | '.env('APP_NAME'))

@section('content')
<div class="row">
    <h3 class="my-16">Role & Permission / Role</h3>
    <div class="col">
        <div class="card card-body">
            <div class="col">
                <div class="row justify-content-between my-10 gap-10 px-0">
                    <div class="row mx-md-0 col-auto mx-auto gap-10">
                        @can('role-store')
                        <button class="btn btn-primary col col-sm-auto add-role"><i class="ri-add-line remix-icon"></i><span>Tambah Role</span></button>
                        @endcan
                    </div>
                    <div class="mx-md-0 col-auto mx-auto">
                        <div class="input-group align-items-center">
                            <span class="input-group-text hp-bg-dark-100 border-end-0 pe-0 bg-white">
                                <i class="iconly-Light-Search text-black-80" style="font-size: 16px;"></i>
                            </span>
                            <input class="form-control border-start-0 ps-8" id="search_role" name="search_role" type="text" value="" placeholder="Search Role">
                        </div>
                    </div>
                </div>
                <div class="table-responsive mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th class="text-center">Jumlah User</th>
                                <th class="text-center">Jumlah Permission</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_role">
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <nav class="col-12 col-sm-auto text-center pagination_role" aria-label="Page navigation example">
                    </nav>
                    <br>
                    <p class="role_entry"></p>
                </div>
            </div>
        </div>
    </div>
    @section('modal')
    <div class="modal fade" id="modalRole" aria-labelledby="modalRole" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="formRole">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalRoleLabel">Tambah Role</h5>
                        <button class="btn-close hp-bg-none d-flex align-items-center justify-content-center" data-bs-dismiss="modal" type="button" aria-label="Close">
                            <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                        </button>
                    </div>
                    <div class="modal-body body-role">
                        <input class="role_id" id="role_id" name="id" type="text" hidden>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input class="form-control name" id="name" name="name" type="text" placeholder="Nama" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @can('role-store')
                        <button class="btn btn-primary btn-save-role" type="submit"><i class="icofont icofont-plus"></i> Tambah</button>
                        @endcan
                        @can('role-update')
                        <button class="btn btn-primary btn-edit-role" type="submit"><i class="icofont icofont-pencil"></i> Edit</button>
                        @endcan
                        @can('role-destroy')
                        <button class="btn btn-danger btn-delete-role" type="button" data-id="0"><i class="icofont icofont-trash"></i> Hapus</button>
                        @endcan
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
</div>
@endsection

@section('js')
<script src="{{asset('app-assets/js/pagination/pagination.js')}}"></script>
<script type="text/javascript">
    @canany(['role-store', 'role-update'])
    $('#formRole').unbind('submit');
    @endcanany
    $(function() {
        loadRole(1)
    })

    function pageRole(totalPages, visiblePages){
        $(".pagination_role").twbsPagination({
            totalPages: totalPages,
            visiblePages: visiblePages,
            paginationClass: 'pagination justify-content-center mr-6',
            pageClass: 'rolePageLink',
            onPageClick: function (event, p) {
                loadRole(p)
            }
        })
    }

    function loadRole(page, search){
        search = $('#search_role').val()
        $.ajax({
            type: "get",
            url: "{{ route('dashboard.role.data') }}",
            data: {
                'search': search,
                'page': page
            },
            success: function(res) {
                var entry = `
                Menampilkan ${res.data.from} sampai ${res.data.to} dari ${res.data.total} entri
                `
                $('.role_entry').text(entry)

                if(res.total > 50){
                    pageRole(res.last_page, 5)
                } else {
                    pageRole(res.last_page, res.last_page)
                }
                let data = ''
                if(res.data.data.length > 0){
                    var urutan = (res.data.current_page - 1) * 10
                    $.each(res.data.data, (k, v) => {
                        action = `
                        <a type="button" href="{{route('dashboard.permission.index', ':id')}}" class="btn btn-sm btn-primary" title="Permission"><i class="icofont icofont-verification-check"></i></a>
                        <button class="btn btn-sm btn-primary detail-role" title="Detail" data-id="${v.id}"><i class="icofont icofont-gear"></i></button>
                        `.replace(':id', v.id)
                        data += `<tr>
                        <td scope="row">${urutan+(++k)}</td>
                        <td>${v.name}</td>
                        <td class="text-center">${v.users_count}</td>
                        <td class="text-center">${v.permissions_count}</td>
                        <td class="text-center">
                        ${action}
                        </td>
                        </tr>`
                    })
                    $('#tbody_role').html(data)
                } else {
                    data = `
                    <tr>
                    <td class="text-center" colspan="${$('#thead_role th').length}">Data Kosong</td>
                    </tr>
                    `
                    $('#tbody_role').html(data)
                    $('.role_entry').empty()
                }
            },
            error: function(request, status, error) {
                let errorData = JSON.parse(request.responseText)
            }
        })
    }

    $('#search_role').keyup(delay(function (e) {
        let search_role = $(this).val()
        $(".pagination_role").twbsPagination('destroy')
        loadRole(1, search_role)
    }, 250))

    $('.add-role').on('click', function() {
        $('.btn-save-role').show()
        $('.btn-edit-role').hide()
        $('.btn-delete-role').attr('data-id', 0)
        $('.btn-delete-role').hide()
        $('#modalRoleLabel').html('Tambah Role')
        $('#formRole').trigger('reset')
        $('#modalRole').modal('show')
    })

    $('body').on('click', '.detail-role', function () {
        var id = $(this).data('id')
        $.get("{{ route('dashboard.role.show', ':id') }}".replace(':id', id), function (data) {
            $('.role_id').val(data.data.id)
            $('.name').val(data.data.name)
            $('.btn-save-role').hide()
            $('.btn-delete-role').attr('data-id', data.data.id)
            $('.btn-edit-role').show()
            $('.btn-delete-role').show()
            $('#modalRoleLabel').html('Edit Role')
            $('#modalRole').modal('show')
        })
    })

    $('#formRole').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            data: $(this).serialize(),
            url: "{{ route('dashboard.role.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $(this).trigger("reset")
                $('#modalRole').modal('hide')
                swal("Success...", data.message, "success")
                loadRole(1)
            },
            error: function (data) {
                swal("Error...", data.message, "error")
            }
        })
    })

    $('.btn-delete-role').on('click', function(){
        var id = $(this).data('id')
        $.ajax({
            type: "DELETE",
            url: "{{ route('dashboard.role.destroy', ':id') }}".replace(':id', id),
            success: function (data) {
                $(this).trigger("reset")
                $('#modalRole').modal('hide')
                swal("Success...", data.message, "success")
                loadRole(1)
            },
            error: function (data) {
                swal("Error...", data.message, "error")
            }
        });
    })
</script>
@endsection