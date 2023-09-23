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
                                <a href="{{ route('admin.user.create') }}"
                                   class="btn btn-blue waves-effect waves-light"><i class="mdi mdi-plus"></i>
                                    Add
                                    Admin</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Admin All</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>

                                @foreach($allAdmin as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img
                                                src="{{ !empty($item->photo) ? asset('upload/admin_images/'.$item->photo) : asset('upload/no_image.jpg') }}"
                                                alt="{{ $item->name }}" style="width: 50px; height: 50px;">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if(!empty($item->username))
                                                {{ $item->username }}
                                            @else
                                                <p class="text-danger">Username not found!</p>
                                            @endif
                                        </td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if(!empty($item->phone))
                                                {{ $item->phone }}
                                            @else
                                                <p class="text-danger">Phone not found!</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->status == 'active')
                                                <span class="badge badge-pill bg-success">Active</span>
                                            @else
                                                <span class="badge badge-pill bg-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @foreach($item->roles as $role)
                                                <span class="badge badge-pill bg-info">{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user.edit', $item->id) }}"
                                               class="btn btn-warning rounded-pill waves-effect waves-light"><i
                                                    class="mdi mdi-lead-pencil"></i> Edit</a>
                                            <a id="delete" href="{{ route('admin.user.destroy', $item->id) }}"
                                               class="btn btn-danger rounded-pill waves-effect waves-light"><i
                                                    class="mdi mdi-delete"></i> Delete</a>

                                            @if($item->status == 'active')
                                                <a href="{{ route('admin.user.inactive', $item->id) }}"
                                                   class="btn btn-primary rounded-pill waves-effect waves-light"
                                                   title="Inactive"><i class="fa-solid fa-thumbs-down"></i></a>
                                            @else
                                                <a href="{{ route('admin.user.active', $item->id) }}"
                                                   class="btn btn-primary rounded-pill waves-effect waves-light"
                                                   title="Active"><i class="fa-solid fa-thumbs-up"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection
