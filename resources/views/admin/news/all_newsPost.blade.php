@extends('admin.admin_dashboard')

@section('content')

    @php
        $activenews = \App\Models\NewsPost::where('status', 1)->get();
        $inactivenews = \App\Models\NewsPost::where('status', 0)->get();
        $breakingnews = \App\Models\NewsPost::where('breaking_news', 1)->get();
    @endphp

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                @if(\Illuminate\Support\Facades\Auth::user()->can('news.add'))
                                    <a href="{{ route('admin.newsPost.create') }}"
                                       class="btn btn-blue waves-effect waves-light"><i class="mdi mdi-plus"></i>
                                        Add
                                        News Post</a>
                                @endif
                            </ol>
                        </div>
                        <h4 class="page-title">News Post All</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                        <i class="fe-heart font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ count($allNews) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">All News Post</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                        <i class="fe-thumbs-up font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ count($activenews) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Active News Post</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                        <i class="fe-thumbs-down font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ count($inactivenews) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">InActive News Post</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                        <i class="fe-eye font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ count($breakingnews) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Breaking News Post</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Subcategory</th>
                                    <th>User</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>

                                @foreach($allNews as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img
                                                src="{{ asset($item->image) }}"
                                                alt="{{ $item->news_title }}" style="width: 50px; height: 50px;">
                                        </td>
                                        <td>{{ \Illuminate\Support\Str::limit($item->news_title, 20) }}</td>
                                        <td>{{ $item->category->category_name }}</td>
                                        <td>
                                            @if($item->subcategory_id != NULL)
                                                {{$item->subcategory->subcategory_name}}
                                            @else
                                                <p class="text-danger">Subcategory name not found!</p>
                                            @endif
                                        </td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->post_date)->diffForHumans() }}</td>
                                        <td>
                                            @if($item->status == 1)
                                                <span class="badge badge-pill bg-success">Active</span>
                                            @else
                                                <span class="badge badge-pill bg-danger">InActive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('news.edit'))
                                                <a href="{{ route('admin.newsPost.edit', $item->id) }}"
                                                   class="btn btn-warning rounded-pill waves-effect waves-light"><i
                                                        class="mdi mdi-lead-pencil"></i> Edit</a>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('news.delete'))
                                                <a id="delete" href="{{ route('admin.newsPost.destroy', $item->id) }}"
                                                   class="btn btn-danger rounded-pill waves-effect waves-light"><i
                                                        class="mdi mdi-delete"></i> Delete</a>
                                            @endif

                                            @if($item->status == 1)
                                                <a href="{{ route('admin.newsPost.inactive', $item->id) }}"
                                                   class="btn btn-primary rounded-pill waves-effect waves-light"
                                                   title="Inactive"><i class="fa-solid fa-thumbs-down"></i></a>
                                            @else
                                                <a href="{{ route('admin.newsPost.active', $item->id) }}"
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
