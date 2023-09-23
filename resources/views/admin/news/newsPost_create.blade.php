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
                                <li class="breadcrumb-item active">Add News Post</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add News Post</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('admin.newsPost.store') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="category_id" class="form-label">Category Name</label>
                                        <select class="form-select" name="category_id">
                                            <option>Select Category</option>
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="subcategory_id" class="form-label">Subcategory Name</label>
                                        <select class="form-select" name="subcategory_id">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="user_id" class="form-label">Writer</label>
                                        <select class="form-select" id="example-select" name="user_id">
                                            <option>Select Writer</option>
                                            @foreach($adminuser as $user)
                                                <option
                                                    value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="news_title" class="form-label">News Post Title</label>
                                        <input type="text" name="news_title" class="form-control"
                                               placeholder="News Post Title">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="image" class="form-label">News Post Photo</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="image" class="form-label"></label>
                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                             class="rounded-circle avatar-lg img-thumbnail" alt="">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label for="news_details" class="form-label">News Post Details</label>
                                        <textarea name="news_details"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="tags" class="form-label">News Post Tags</label>
                                        <input type="text" name="tags" class="selectize-close-btn" value="awesome">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-check mb-2 form-check-primary">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       name="breaking_news"
                                                       id="breaking_news">
                                                <label class="form-check-label" for="breaking_news">Breaking
                                                    News</label>
                                            </div>
                                            <div class="form-check mb-2 form-check-primary">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       name="top_slider"
                                                       id="top_slider">
                                                <label class="form-check-label" for="top_slider">Top Slider</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check mb-2 form-check-danger">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       name="first_section_three"
                                                       id="first_section_three">
                                                <label class="form-check-label" for="first_section_three">First Section
                                                    Three</label>
                                            </div>
                                            <div class="form-check mb-2 form-check-danger">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       name="first_section_nine"
                                                       id="first_section_nine">
                                                <label class="form-check-label" for="first_section_nine">First Section
                                                    Nine</label>
                                            </div>
                                        </div>
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
            $('#myForm').validate({
                rules: {
                    news_title: {
                        required: true,
                    },
                },
                messages: {
                    news_title: {
                        required: 'Please Enter News Title',
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>

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
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/subcategory/ajax') }}/" + category_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('select[name="subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="subcategory_id"]').append('<option value=" ' + value.id + ' ">' + value.subcategory_name + '</option>');
                            });
                        }
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
