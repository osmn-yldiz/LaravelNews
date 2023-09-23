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
                                <li class="breadcrumb-item active">Edit Permission</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Permission</h4>
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
                                  action="{{ route('admin.permission.update', $permission->id) }}">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="name" class="form-label">Permission Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                               value="{{ $permission->name }}">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="group_name" class="form-label">Group Name</label>
                                        <select name="group_name" class="form-select" id="group_name">
                                            <option>Select One Group</option>
                                            <option
                                                value="category" {{ $permission->group_name == 'category' ? 'selected' : '' }}>
                                                Category
                                            </option>
                                            <option
                                                value="subcategory" {{ $permission->group_name == 'subcategory' ? 'selected' : '' }}>
                                                SubCategory
                                            </option>
                                            <option
                                                value="news" {{ $permission->group_name == 'news' ? 'selected' : '' }}>
                                                News
                                            </option>
                                            <option
                                                value="banner" {{ $permission->group_name == 'banner' ? 'selected' : '' }}>
                                                Banner
                                            </option>
                                            <option
                                                value="photo" {{ $permission->group_name == 'photo' ? 'selected' : '' }}>
                                                Photo
                                            </option>
                                            <option
                                                value="video" {{ $permission->group_name == 'video' ? 'selected' : '' }}>
                                                Video
                                            </option>
                                            <option
                                                value="live" {{ $permission->group_name == 'live' ? 'selected' : '' }}>
                                                Live
                                            </option>
                                            <option
                                                value="review" {{ $permission->group_name == 'review' ? 'selected' : '' }}>
                                                Review
                                            </option>
                                            <option
                                                value="seo" {{ $permission->group_name == 'seo' ? 'selected' : '' }}>
                                                Seo
                                            </option>
                                            <option
                                                value="admin" {{ $permission->group_name == 'admin' ? 'selected' : '' }}>
                                                Admin Setting
                                            </option>
                                            <option
                                                value="role" {{ $permission->group_name == 'role' ? 'selected' : '' }}>
                                                Role and Permission
                                            </option>
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
