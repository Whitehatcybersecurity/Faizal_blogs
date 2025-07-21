@extends('back_end.layouts.admin_main_master')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Admin Page</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1" id="heading">Site Logo</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="live-preview">
                                <form action="/logo/store" name="logo" enctype="multipart/form-data" 
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="hdLogoId" id="hdLogoId">
                                        <input type="hidden" name="hdLogoImage" id="hdLogoImage">
                                    <div class="row gy-4">
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="labelInput" class="form-label">Header Logo Image</label>
                                                <input type="file" class="form-control" name="fileHeaderLogoImage"
                                                    id="fileHeaderLogoImage">
                                            </div>
                                            <div class="img mt-2">
                                                <img src="{{ asset('assets/back_end/images/no-image.jpg') }}" id="previewImage" width="100"
                                                    height="100">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-3 col-md-6">
                                            <div>
                                                <label for="labelInput" class="form-label">Footer Logo Image</label>
                                                <input type="file" class="form-control" name="fileFooterLogoImage"
                                                    id="fileFooterLogoImage">
                                            </div>
                                            <div class="img mt-2">
                                                <img src="{{ asset('assets/back_end/images/no-image.jpg') }}" id="previewImage" width="100"
                                                    height="100">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-3 col-md-6">
                                            <button type="submit" id="btnSave"
                                                class="btn btn-success waves-effect waves-light">Add</button>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
    </div>
    <!-- container-fluid -->
</div>
@endsection
@section('footer')
    <script src="{{ asset('assets/back_end/js/backend/logo.js') }}"></script>
@endsection
