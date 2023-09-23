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
                                <li class="breadcrumb-item active">Edit Video</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Video</h4>
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
                                  action="{{ route('admin.videogallery.update', $video->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="video_title" class="form-label">Video Title</label>
                                        <input type="text" name="video_title" class="form-control" id="video_title"
                                               value="{{ $video->video_title }}">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="video_url" class="form-label">Video Url</label>
                                        <input type="text" name="video_url" class="form-control" id="video_url"
                                               value="{{ $video->video_url }}">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="image" class="form-label">Video Image</label>
                                        <input type="file" name="video_image" class="form-control" id="image">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="" class="form-label"></label>
                                        <img id="showImage"
                                             src="{{ !empty($video->video_image) ? asset($video->video_image) : url('upload/no_image.jpg') }}"
                                             class="rounded-circle avatar-lg img-thumbnail" alt="Video Image">
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

@endsection
