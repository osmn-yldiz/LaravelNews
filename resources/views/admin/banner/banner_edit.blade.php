@extends('admin.admin_dashboard')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Edit Banner</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Banner</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post"
                                  action="{{ route('admin.banner.update', $banner->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="home_one" class="form-label">Home Banner One</label>
                                        <input type="file" name="home_one" class="form-control" id="image">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="" class="form-label"></label>
                                        <img id="showImage"
                                             src="{{ !empty($banner->home_one) ? url($banner->home_one) : url('upload/no_image.jpg') }}"
                                             alt="Home Banner One"
                                             style="width: 400px; height: 60px;">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="home_two" class="form-label">Home Banner Two</label>
                                        <input type="file" name="home_two" class="form-control" id="image2">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="" class="form-label"></label>
                                        <img id="showImage2"
                                             src="{{ !empty($banner->home_two) ? url($banner->home_two) : url('upload/no_image.jpg') }}"
                                             alt="Home Banner Two"
                                             style="width: 400px; height: 60px;">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="home_three" class="form-label">Home Banner Three</label>
                                        <input type="file" name="home_three" class="form-control" id="image3">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="" class="form-label"></label>
                                        <img id="showImage3"
                                             src="{{ !empty($banner->home_three) ? url($banner->home_three) : url('upload/no_image.jpg') }}"
                                             alt="Home Banner Three"
                                             style="width: 400px; height: 60px;">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="home_four" class="form-label">Home Banner Four</label>
                                        <input type="file" name="home_four" class="form-control" id="image4">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="" class="form-label"></label>
                                        <img id="showImage4"
                                             src="{{ !empty($banner->home_four) ? url($banner->home_four) : url('upload/no_image.jpg') }}"
                                             alt="Home Banner Four"
                                             style="width: 400px; height: 60px;">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="news_category_one" class="form-label">News Category Banner</label>
                                        <input type="file" name="news_category_one" class="form-control" id="image5">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="" class="form-label"></label>
                                        <img id="showImage5"
                                             src="{{ !empty($banner->news_category_one) ? url($banner->news_category_one) : url('upload/no_image.jpg') }}"
                                             alt="News Category Banner"
                                             style="width: 400px; height: 60px;">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="news_details_one" class="form-label">News Details Banner</label>
                                        <input type="file" name="news_details_one" class="form-control" id="image6">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="" class="form-label"></label>
                                        <img id="showImage6"
                                             src="{{ !empty($banner->news_details_one) ? url($banner->news_details_one) : url('upload/no_image.jpg') }}"
                                             alt="News Details Banner"
                                             style="width: 400px; height: 60px;">
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes
                                </button>

                            </form>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image2').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage2').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image3').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage3').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image4').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage4').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image5').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage5').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image6').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage6').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
