@extends('layouts.dashboard')

@section('title', 'User | Bank Syariah Indonesia - UAE')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-profile.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/croppie.css')}}">
<style>
    #upload-demo {
        width: 250px;
        height: 250px;
        padding-bottom: 25px;
    }
</style>
@endsection

@section('content')
<div class="row mb-32 gy-32">
    <div class="col-12">
        <div class="row bg-black-0 hp-bg-color-dark-100 rounded pe-16 pe-sm-32 mx-0">
            <div class="col-lg-3 py-24">
                <div class="w-100">
                    <div class="hp-profile-menu-header mt-16 mt-lg-0 text-center mb-64">
                        <div class="hp-menu-header-btn mb-12 text-end">
                            <div class="d-inline-block" id="profile-menu-dropdown" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <button type="button" class="btn btn-text btn-icon-only">
                                    <i class="ri-more-2-line text-black-100 hp-text-color-dark-30 lh-1"
                                        style="font-size: 24px;"></i>
                                </button>
                            </div>

                            <ul class="dropdown-menu" aria-labelledby="profile-menu-dropdown">
                                <li>
                                    <a class="dropdown-item" href="javascript:;">Change Avatar</a>
                                    <a class="dropdown-item text-danger" href="javascript:;">Delete Avatar</a>
                                </li>
                            </ul>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div class="d-inline-block position-relative">
                                <div class="avatar-item d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 80px; height: 80px;">
                                    <img src="{{asset('app-assets/img/default-profile.svg')}}">
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-24 mb-4">John Doe</h4>
                        <a href="mailto:dolores@yoda.com" class="hp-p1-body">johndoe@example.com</a>
                    </div>
                </div>

                <div class="hp-profile-menu-body w-100 text-start mt-48 mt-lg-0">
                    <ul class="me-n1 mx-lg-n12">
                        <li class="mt-4 mb-16">
                            <a href="{{url('dashboard/profile')}}"
                                class="position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                                <i class="iconly-Curved-User me-16"></i>
                                <span>Personal Information</span>

                                <span
                                    class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                                    style="width: 2px;"></span>
                            </a>
                        </li>

                        <li class="mt-4 mb-16">
                            <a href="{{url('dashboard/profile/password')}}"
                                class="active   position-relative text-black-80 hp-text-color-dark-30 hp-hover-text-color-primary-1 hp-hover-text-color-dark-0 py-12 px-24 d-flex align-items-center">
                                <i class="iconly-Curved-Password me-16"></i>
                                <span>Password Change</span>

                                <span
                                    class="hp-menu-item-line position-absolute opacity-0 h-100 top-0 end-0 bg-primary hp-bg-dark-0"
                                    style="width: 2px;"></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="hp-profile-menu-footer text-center">
                    <img src="{{asset('app-assets/img/pages/profile/menu-img.svg')}}" alt="Profile Image">
                </div>
            </div>

            <div class="col-lg-9 ps-16 ps-sm-32 py-24 py-sm-32 overflow-hidden">
                <div class="row">
                    <div class="col-12">
                        <h2>Change Password</h2>
                        <p class="hp-p1-body mb-0">Set a unique password to protect your account.</p>
                    </div>

                    <div class="divider border-black-40 hp-border-color-dark-80"></div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 col-sm-8 col-md-7 col-xl-5 col-xxxl-3">
                                <form>
                                    <div class="mb-24">
                                        <label for="profileOldPassword" class="form-label">Old Password :</label>
                                        <input type="password" class="form-control" id="profileOldPassword"
                                            placeholder="Password">
                                    </div>

                                    <div class="mb-24">
                                        <label for="profileNewPassword" class="form-label">New Password :</label>
                                        <input type="password" class="form-control" id="profileNewPassword"
                                            placeholder="Password">
                                    </div>

                                    <div class="mb-24">
                                        <label for="profileConfirmPassword" class="form-label">Confirm New Password
                                            :</label>
                                        <input type="password" class="form-control" id="profileConfirmPassword"
                                            placeholder="Password">
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<div class="modal fade" id="profileContactEditModal" tabindex="-1" aria-labelledby="profileContactEditModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 416px;">
        <div class="modal-content">
            <div class="modal-header py-16">
                <h5 class="modal-title" id="profileContactEditModalLabel">Contact Edit</h5>
                <button type="button" class="btn-close hp-bg-none d-flex align-items-center justify-content-center"
                    data-bs-dismiss="modal" aria-label="Close">
                    <i class="ri-close-line hp-text-color-dark-0 lh-1" style="font-size: 24px;"></i>
                </button>
            </div>

            <div class="divider my-0"></div>

            <div class="modal-body py-48">
                <form>
                    <div class="row g-24">
                        <div class="col-12">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName">
                        </div>

                        <div class="col-12">
                            <label for="displayName" class="form-label">Display Name</label>
                            <input type="text" class="form-control" id="displayName">
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>

                        <div class="col-12">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone">
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" id="address" class="form-control"></textarea>
                        </div>

                        <div class="col-6">
                            <button type="button" class="btn btn-primary w-100">Edit</button>
                        </div>

                        <div class="col-6">
                            <div class="btn w-100" data-bs-dismiss="modal">Cancel</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="ModalCropImage" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-style text-center">
            <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center">
                    <div id="upload-demo" class="center-block"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="cropImageBtn" class="btn btn-primary">Crop & Update</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script src="{{asset('panel/js/croppie.js')}}"></script>
<script>
    function changeAvatar(){
        $("#profile-img-input").trigger('click')
    }

    var uploadCrop,
        tempFilename,
        rawImg,
        imageId;

    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.upload-demo').addClass('ready');
                $('#ModalCropImage').modal('show');
                rawImg = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            swal("Sorry - you're browser doesn't support the FileReader API");
        }
    }

    uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: 200,
            height: 200,
        },
        enforceBoundary: false,
        enableExif: true
    });
    $('#ModalCropImage').on('shown.bs.modal', function () {
        // alert('Shown pop');
        uploadCrop.croppie('bind', {
            url: rawImg
        }).then(function () {
            console.log('jQuery bind complete');
        });
    });

    $('.item-img').on('change', function () {
        imageId = $(this).data('id');
        tempFilename = $(this).val();
        $('#cancelCropBtn').data('id', imageId);
        readFile(this);
    });
    $('#cropImageBtn').on('click', function (ev) {
        uploadCrop.croppie('result', {
            type: 'base64',
            format: 'jpeg',
            size: {
                width: 100,
                height: 100
            }
        }).then(function (resp) {
            $('#item-img-output').attr('src', resp);
            $('#ModalCropImage').modal('hide');
        });
    });

</script>
@endsection
