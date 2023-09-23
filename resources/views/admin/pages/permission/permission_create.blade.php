@extends('admin.admin_dashboard')

@section('content')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Add Permission</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add Permission</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('admin.permission.store') }}">
                                @csrf
                                @method('POST')

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name" class="form-label">Permission Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="Permission Name">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="group_name" class="form-label">Group Name</label>
                                        <select name="group_name" class="form-select" id="group_name">
                                            <option>Select One Group</option>
                                            <option value="category">Category</option>
                                            <option value="subCategory">SubCategory</option>
                                            <option value="news">News</option>
                                            <option value="banner">Banner</option>
                                            <option value="photo">Photo</option>
                                            <option value="video">Video</option>
                                            <option value="live">Live</option>
                                            <option value="review">Review</option>
                                            <option value="seo">Seo</option>
                                            <option value="admin">Admin Setting</option>
                                            <option value="role">Role and Permission</option>
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

@endsection
