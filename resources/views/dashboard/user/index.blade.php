@extends('layouts.dashboard')

@section('title', 'User | Bank Syariah Indonesia - UAE')

@section('content')
<div class="row mb-32 gy-32">
    <div class="col-12">
        <div class="row justify-content-between gy-32">
            <div class="col-12 col-md-4">
                <h4 class="h4">User</h4>
            </div>
            <div class="col-12 col-md-7">
                <div class="row g-16 align-items-center justify-content-end">
                    <div class="col-12 col-md-6 col-xl-4">
                        <div class="input-group align-items-center">
                            <span class="input-group-text bg-white hp-bg-dark-100 border-end-0 pe-0">
                                <i class="iconly-Light-Search text-black-80" style="font-size: 16px;"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-8" placeholder="Search">
                        </div>
                    </div>

                    <div class="col hp-flex-none w-auto">
                        <button type="button" class="btn btn-primary w-100" onclick="saveData();">
                            <i class="ri-user-add-line remix-icon"></i>
                            <span>Add User</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card hp-contact-card mb-32">
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table align-middle table-hover table-borderless">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Phone</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <a href="app-contact-detail.html">
                                        <div
                                            class="avatar-item avatar-lg d-flex align-items-center justify-content-center bg-primary-4 hp-bg-dark-primary text-primary hp-text-color-dark-0 rounded-circle">
                                            <img src="{{asset('app-assets/img/default-profile.svg')}}"
                                                alt="Galen Slixby">
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    Galen Slixby
                                </td>
                                <td>Superadmin</td>
                                <td>gslixby0@abc.net.au</td>
                                <td>
                                    <div class="badge bg-success-4 hp-bg-dark-success text-success border-success">
                                        active
                                    </div>
                                </td>
                                <td>9714 0189 8901</td>
                                <td class="text-end">

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="app-contact-detail.html">
                                        <div
                                            class="avatar-item avatar-lg d-flex align-items-center justify-content-center bg-primary-4 hp-bg-dark-primary text-primary hp-text-color-dark-0 rounded-circle">
                                            <img src="{{asset('app-assets/img/default-profile.svg')}}"
                                                alt="Galen Slixby">
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    Galen Slixby
                                </td>
                                <td>Admin</td>
                                <td>gslixby0@abc.net.au</td>
                                <td>
                                    <div class="badge bg-success-4 hp-bg-dark-success text-success border-success">
                                        active
                                    </div>
                                </td>
                                <td>9714 0189 8901</td>
                                <td class="text-end">
                                    <button onclick="detailData()" class="btn btn-text text-primary btn-sm"
                                        title="Detail">
                                        <i class="iconly-Light-Show"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="app-contact-detail.html">
                                        <div
                                            class="avatar-item avatar-lg d-flex align-items-center justify-content-center bg-primary-4 hp-bg-dark-primary text-primary hp-text-color-dark-0 rounded-circle">
                                            <img src="{{asset('app-assets/img/default-profile.svg')}}"
                                                alt="Galen Slixby">
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    Galen Slixby
                                </td>
                                <td>Author</td>
                                <td>gslixby0@abc.net.au</td>
                                <td>
                                    <div class="badge bg-danger-4 hp-bg-dark-danger text-danger border-danger">inactive
                                    </div>
                                </td>
                                <td>9714 0189 8901</td>
                                <td class="text-end">
                                    <button onclick="detailData()" class="btn btn-text text-primary btn-sm"
                                        title="Detail">
                                        <i class="iconly-Light-Show"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @include('partials.dashboard.pagination')
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-16 px-24">
                <h5 class="modal-title" id="modalDataLabel">Add Contact</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider m-0"></div>

            <form id="formData">
                <div class="modal-body">
                    <input type="number" hidden>
                    <div class="row gx-8">
                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="name" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Name
                                </label>
                                <input type="text" class="form-control" id="name" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="email" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Email
                                </label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="phone" class="form-label">
                                    <span class="text-danger me-4"></span>
                                    Phone
                                </label>
                                <input type="number" class="form-control" id="phone" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="role" class="form-label">
                                    <span class="text-danger me-4"></span>
                                    Jabatan
                                </label>
                                <input type="text" class="form-control" id="role" required>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="role" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Role
                                </label>
                                <select class="form-select" id="role" required>
                                    <option selected hidden>Role</option>
                                    <option value="1">Superadmin</option>
                                    <option value="2">Admin</option>
                                    <option value="3">Author</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="mb-24">
                                <label for="status" class="form-label">
                                    <span class="text-danger me-4">*</span>
                                    Status
                                </label>
                                <select class="form-select" id="status" required>
                                    <option selected hidden>Status</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="alert alert-dark default-password">Default Password : 12345678</div>
                        
                    </div>
                </div>

                <div class="modal-footer pt-0 px-24 pb-24">
                    <div class="divider"></div>
                    <div class="d-flex justify-content-between w-100">
                        <div>
                            <button type="button" class="btn btn-danger btn-delete">Delete</button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-text btn-cancel"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-success btn-edit" onclick="editData()">Edit</button>
                            <button type="submit" class="btn btn-primary btn-save">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function saveData() {
        $('.default-password').show();
        $('.btn-edit').hide();
        $('.btn-delete').hide();
        $('.btn-save').show();
        $('#modalData').modal('show');
    }

    function detailData() {
        $('.default-password').hide();
        $('.btn-edit').show();
        $('.btn-delete').show();
        $('.btn-save').hide();
        $(".modal-body :input").prop("disabled", true);
        $('#modalData').modal('show');
    }

    function editData(){
        $(".modal-body :input").prop("disabled", false);
        $('.btn-edit').hide();
        $('.btn-delete').hide();
        $('.btn-save').show();
    }

    function deleteData(){

    }
</script>
@endsection
