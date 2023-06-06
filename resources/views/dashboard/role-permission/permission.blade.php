@extends('layouts.dashboard')

@section('title', 'Permission | '.env('APP_NAME'))

@section('content')
<div class="row">
    <h3 class="my-16">Role & Permission / {{$data['role']['name']}} Permission</h3>
    <div class="col">
        <div class="card card-body">
            <div class="col">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <a href="{{url()->previous()}}" class="btn btn-primary add-role">
                            <span><i class="icofont icofont-arrow-left"></i> Kembali</span>
                        </a>
                    </div>
                </div>
                <form method="POST" action="{{route('dashboard.permission.store', $data['role']['id'])}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['role']['id']}}">
                    <div class="table-responsive mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th class="text-center">Retrieve</th>
                                    <th class="text-center">Create</th>
                                    <th class="text-center">Update</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_role">
                                <tr>
                                    <td>Role & Permision</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="role-index" {{($data['role']->hasPermissionTo('role-index')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="role-store" {{($data['role']->hasPermissionTo('role-store')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="role-update" {{($data['role']->hasPermissionTo('role-update')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="role-destroy" {{($data['role']->hasPermissionTo('role-destroy')) ? 'checked' : ''}}>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Filemanager</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="filemanager-index" {{($data['role']->hasPermissionTo('filemanager-index')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="filemanager-store" {{($data['role']->hasPermissionTo('filemanager-store')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="filemanager-update" {{($data['role']->hasPermissionTo('filemanager-update')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="filemanager-destroy" {{($data['role']->hasPermissionTo('filemanager-destroy')) ? 'checked' : ''}}>
                                    </td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="user-index" {{($data['role']->hasPermissionTo('user-index')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="user-store" {{($data['role']->hasPermissionTo('user-store')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="user-update" {{($data['role']->hasPermissionTo('user-update')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="user-destroy" {{($data['role']->hasPermissionTo('user-destroy')) ? 'checked' : ''}}>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Blog</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="blog-index" {{($data['role']->hasPermissionTo('blog-index')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="blog-store" {{($data['role']->hasPermissionTo('blog-store')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="blog-update" {{($data['role']->hasPermissionTo('blog-update')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="blog-destroy" {{($data['role']->hasPermissionTo('blog-destroy')) ? 'checked' : ''}}>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Crud</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="crud-index" {{($data['role']->hasPermissionTo('crud-index')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="crud-store" {{($data['role']->hasPermissionTo('crud-store')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="crud-update" {{($data['role']->hasPermissionTo('crud-update')) ? 'checked' : ''}}>
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="permission[]" value="crud-destroy" {{($data['role']->hasPermissionTo('crud-destroy')) ? 'checked' : ''}}>
                                    </td>
                                </tr>
                                @canany(['role-store', 'role-update'])
                                <tr>
                                    <td colspan="5">
                                        <button type="submit" class="btn btn-primary">
                                            <span><i class="icofont icofont-save"></i> Simpan</span>
                                        </button>
                                    </td>
                                </tr>
                                @endcanany
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection