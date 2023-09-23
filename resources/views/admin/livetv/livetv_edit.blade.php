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
                                <li class="breadcrumb-item active">Edit Live Tv</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Live Tv</h4>
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
                                  action="{{ route('admin.livetv.update', $live->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="live_url" class="form-label">Live Url</label>
                                        <input type="text" name="live_url" class="form-control" id="live_url"
                                               value="{{ $live->live_url }}">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="image" class="form-label">Live Image</label>
                                        <input type="file" name="live_image" class="form-control" id="image">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="" class="form-label"></label>
                                        <img id="showImage"
                                             src="{{ !empty($live->live_image) ? asset($live->live_image) : url('upload/no_image.jpg') }}"
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
