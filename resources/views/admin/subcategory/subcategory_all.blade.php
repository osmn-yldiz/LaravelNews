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
                                @if(\Illuminate\Support\Facades\Auth::user()->can('subcategory.add'))
                                    <a href="{{ route('admin.subcategory.create') }}"
                                       class="btn btn-blue waves-effect waves-light"><i class="mdi mdi-plus"></i>
                                        Add
                                        SubCategory</a>
                                @endif
                            </ol>
                        </div>
                        <h4 class="page-title">SubCategory All</h4>
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
                                    <th>Category Name</th>
                                    <th>SubCategory Name</th>
                                    <th>SubCategory Slug</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>

                                @foreach($subcategories as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->category->category_name }}</td>
                                        <td>{{ $item->subcategory_name }}</td>
                                        <td>{{ $item->subcategory_slug }}</td>
                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('subcategory.edit'))
                                                <a href="{{ route('admin.subcategory.edit', $item->id) }}"
                                                   class="btn btn-warning rounded-pill waves-effect waves-light"><i
                                                        class="mdi mdi-lead-pencil"></i> Edit</a>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('subcategory.delete'))
                                                <a id="delete"
                                                   href="{{ route('admin.subcategory.destroy', $item->id) }}"
                                                   class="btn btn-danger rounded-pill waves-effect waves-light"><i
                                                        class="mdi mdi-delete"></i> Delete</a>
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
