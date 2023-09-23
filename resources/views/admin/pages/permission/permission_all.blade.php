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
                                <a href="{{ route('admin.permission.create') }}"
                                   class="btn btn-blue waves-effect waves-light"><i class="mdi mdi-plus"></i>
                                    Add Permission</a>
                            </ol>
                        </div>
                        <h4 class="page-title">Permission All</h4>
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
                                    <th>Permission Name</th>
                                    <th>Group Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>

                                @foreach($permissions as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->group_name }}</td>
                                        <td>
                                            <a href="{{ route('admin.permission.edit', $item->id) }}"
                                               class="btn btn-warning rounded-pill waves-effect waves-light"><i
                                                    class="mdi mdi-lead-pencil"></i> Edit</a>
                                            <a id="delete" href="{{ route('admin.permission.destroy', $item->id) }}"
                                               class="btn btn-danger rounded-pill waves-effect waves-light"><i
                                                    class="mdi mdi-delete"></i> Delete</a>
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
