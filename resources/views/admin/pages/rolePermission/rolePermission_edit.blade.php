@extends('admin.admin_dashboard')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style type="text/css">
        .form-check-label {
            text-transform: capitalize;
        }
    </style>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Edit Role In Permission</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Role In Permission</h4>
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
                                  action="{{ route('admin.role-permission.update', $role->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="role_id" class="form-label">Roles</label>
                                        <h4>{{ $role->name }}</h4>
                                    </div>

                                    <div class="form-check mb-2 form-check-primary">
                                        <input class="form-check-input" type="checkbox" id="checkbox15">
                                        <label class="form-check-label" for="checkbox15">Permission All</label>
                                    </div>
                                </div>

                                <hr>

                                @foreach($permission_groups as $group)
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            @php
                                                $permissions = \App\Models\User::getpermissionByGroupName($group->group_name);
                                            @endphp
                                            <div class="form-check mb-2 form-check-primary">
                                                <input class="form-check-input" type="checkbox"
                                                       id="" {{ \App\Models\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="">{{ $group->group_name }}</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-9">
                                            @foreach($permissions as $permission)
                                                <div class="form-check mb-2 form-check-primary">
                                                    <input class="form-check-input"
                                                           name="permission[]"
                                                           {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} type="checkbox"
                                                           value="{{ $permission->id }}"
                                                           id="permission_{{ $permission->id }}">
                                                    <label class="form-check-label"
                                                           for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                            @endforeach
                                            <br>
                                        </div>
                                    </div>
                                @endforeach

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
        $("#checkbox15").click(function () {
            if ($(this).is(':checked')) {
                $('input[type = checkbox]').prop('checked', true);
            } else {
                $('input[type = checkbox]').prop('checked', false);
            }
        });
    </script>

@endsection
