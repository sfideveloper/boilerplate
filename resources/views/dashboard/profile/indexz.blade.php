@extends('layouts.dashboard')

@section('title', 'Dashboard | BSI Dubai')

@section('css')
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
<section class="section">
    <div class="container-fluid">
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title mb-30">
                        <h2>Profile</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card-style settings-card-1 mb-30">
                    <div class=" title mb-30 d-flex justify-content-between align-items-center">
                        <h6>Personal Information</h6>
                    </div>
                    <div class="profile-info">
                        <form action="">
                            <div class="d-flex justify-content-center align-items-center mb-30">
                                <div class="profile-image">
                                    <img id="item-img-output" src="{{asset('app-assets/img/default-profile.svg')}}"
                                        alt="" />
                                    <div class="update-image">
                                        <input id="profile-img-input" class="item-img" type="file" accept="image/*"/>
                                        <label for="profile-img-input"><i class="mdi mdi-camera"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-style-1">
                                <label>Name</label>
                                <input type="text" placeholder="Fullname" value="Ammar Muhammad" />
                            </div>
                            <div class="input-style-1">
                                <label>Phone Number</label>
                                <input type="text" placeholder="Phone Number" value="+6281234567890" />
                            </div>
                            <button type="submit" class="main-btn primary-btn btn-hover">
                                Update Profile
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-style settings-card-1 mb-30">
                    <div class=" title mb-30 d-flex justify-content-between align-items-center">
                        <h6>My Password</h6>
                    </div>
                    <div class="profile-info">
                        <form action="">
                            <div class="input-style-1">
                                <label>Old Password</label>
                                <input name="old_password" type="password" placeholder="Old Password" />
                            </div>
                            <div class="input-style-1">
                                <label>New Password</label>
                                <input name="new_password" type="password" placeholder="New Password" />
                            </div>
                            <div class="input-style-1">
                                <label>Confirm New Password</label>
                                <input name="confirm_new_password" type="password" placeholder="Confirm New Password" />
                            </div>
                            <button type="submit" class="main-btn primary-btn btn-hover">
                                Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('modal')
<div class="modal fade" id="ModalCropImage" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content card-style text-center">
            <div class="modal-body">
                <div id="upload-demo" class="center-block"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="cropImageBtn" class="btn btn-primary">Crop</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="{{asset('panel/js/croppie.js')}}"></script>
<script>
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
