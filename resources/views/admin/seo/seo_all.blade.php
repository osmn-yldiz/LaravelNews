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
                                <li class="breadcrumb-item active">Edit Seo</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit Seo</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('admin.seo.update', $seo->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="meta_title" class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control"
                                               value="{{ $seo->meta_title }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="meta_author" class="form-label">Meta Author</label>
                                        <input type="text" name="meta_author" class="form-control"
                                               value="{{ $seo->meta_author }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                        <input type="text" name="meta_keyword" class="selectize-close-btn"
                                               value="{{ $seo->meta_keyword }}">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <input type="text" name="meta_description" class="form-control"
                                               value="{{ $seo->meta_description }}">
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
