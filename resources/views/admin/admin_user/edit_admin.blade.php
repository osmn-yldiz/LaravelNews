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
                                <li class="breadcrumb-item active">Edit Admin</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Admin</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('admin.user.update', $adminuser->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control"
                                               value="{{ $adminuser->name }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control"
                                               value="{{ $adminuser->username }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                               value="{{ $adminuser->email }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" name="phone" class="form-control"
                                               value="{{ $adminuser->phone }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="roles" class="form-label">Roles</label>
                                        <select name="roles" class="form-select" id="roles">
                                            <option>Select One Role</option>
                                            @foreach($roles as $role)
                                                <option
                                                    value="{{ $role->id }}" {{ $adminuser->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
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
                    name: {
                        required: true,
                    },
                    username: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    phone: {
                        required: true,
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: 'Please Enter Your Name',
                    },
                    username: {
                        required: 'Please Enter Username',
                    },
                    email: {
                        required: 'Please Enter Your Email',
                    },
                    phone: {
                        required: 'Please Enter Your Phone',
                    },
                    password: {
                        required: 'Please Enter Your Password',
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
@endsection
