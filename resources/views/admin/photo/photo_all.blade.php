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
                                @if(\Illuminate\Support\Facades\Auth::user()->can('photo.add'))
                                    <a href="{{ route('admin.photogallery.create') }}"
                                       class="btn btn-blue waves-effect waves-light"><i class="mdi mdi-plus"></i>
                                        Add
                                        Photo</a>
                                @endif
                            </ol>
                        </div>
                        <h4 class="page-title">Photo Gallery All</h4>
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
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($photo as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img src="{{ asset($item->photo_gallery) }}"
                                                 style="width: 50px; height: 50px;">
                                        </td>
                                        <td>{{ $item->post_date }}</td>
                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('photo.edit'))
                                                <a href="{{ route('admin.photogallery.edit', $item->id) }}"
                                                   class="btn btn-warning rounded-pill waves-effect waves-light"><i
                                                        class="mdi mdi-lead-pencil"></i> Edit</a>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('photo.delete'))
                                                <a id="delete"
                                                   href="{{ route('admin.photogallery.destroy', $item->id) }}"
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
