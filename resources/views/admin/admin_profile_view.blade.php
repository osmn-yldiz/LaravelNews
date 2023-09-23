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
                                <li class="breadcrumb-item active">Admin Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Admin Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img
                                src="{{ !empty($adminData->photo) ? asset('upload/admin_images/'.$adminData->photo) : asset('upload/no_image.jpg') }}"
                                class="rounded-circle avatar-lg img-thumbnail"
                                alt="profile-image">

                            <h4 class="mb-0">{{ $adminData->name }}</h4>
                            <p class="text-muted">
                                @ {{ !empty($adminData->username) ? $adminData->username : "username" }}</p>

                            <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow
                            </button>
                            <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message
                            </button>

                            <div class="text-start mt-3">
                                <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span
                                        class="ms-2">{{ $adminData->name }}</span>
                                </p>

                                <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span
                                        class="ms-2">{{ !empty($adminData->phone) ? $adminData->phone : "No such data was found." }}</span>
                                </p>

                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span
                                        class="ms-2">{{ $adminData->email }}</span>
                                </p>
                            </div>
                        </div>
                    </div> <!-- end card -->

                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">

                            <div class="tab-pane" id="settings">
                                <form action="{{ route('admin.profile.store') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Admin
                                        Personal Info</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">User Name</label>
                                                <input type="text" name="username" class="form-control" id="username"
                                                       value="{{ $adminData->username }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                       value="{{ $adminData->name }}">
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                       value="{{ $adminData->email }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" name="phone" class="form-control" id="phone"
                                                       value="{{ $adminData->phone }}">
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Admin Photo</label>
                                                <input type="file" id="image" class="form-control" name="photo">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <img id="showImage"
                                                     src="{{ !empty($adminData->photo) ? asset('upload/admin_images/'.$adminData->photo) : asset('upload/no_image.jpg') }}"
                                                     class="rounded-circle avatar-lg img-thumbnail"
                                                     alt="profile-image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2">
                                            <i class="mdi mdi-content-save"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <!-- end settings content-->

                        </div>
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

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
