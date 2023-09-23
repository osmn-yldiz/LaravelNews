@php
    $id = \Illuminate\Support\Facades\Auth::user()->id;
    $userid = \App\Models\User::find($id);
    $status = $userid->status;
@endphp

<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                @if($status == 'active')

                    <li class="menu-title mt-2">Menu</li>

                    @if(\Illuminate\Support\Facades\Auth::user()->can('category.menu'))
                        <li>
                            <a href="#sidebarCategory" data-bs-toggle="collapse">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span> Category </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarCategory">
                                <ul class="nav-second-level">
                                    @if(\Illuminate\Support\Facades\Auth::user()->can('category.list'))
                                        <li>
                                            <a href="{{ route('admin.category.index') }}">Category</a>
                                        </li>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Auth::user()->can('category.add'))
                                        <li>
                                            <a href="{{ route('admin.category.create') }}">Create Category</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->can('subcategory.menu'))
                        <li>
                            <a href="#sidebarSubcategory" data-bs-toggle="collapse">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span> SubCategory </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarSubcategory">
                                <ul class="nav-second-level">
                                    @if(\Illuminate\Support\Facades\Auth::user()->can('subcategory.list'))
                                        <li>
                                            <a href="{{ route('admin.subcategory.index') }}">SubCategory</a>
                                        </li>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Auth::user()->can('subcategory.add'))
                                        <li>
                                            <a href="{{ route('admin.subcategory.create') }}">Create SubCategory</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->can('news.menu'))
                        <li>
                            <a href="#sidebarNewsPost" data-bs-toggle="collapse">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span> News Post </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarNewsPost">
                                <ul class="nav-second-level">
                                    @if(\Illuminate\Support\Facades\Auth::user()->can('news.list'))
                                        <li>
                                            <a href="{{ route('admin.newsPost.index') }}">News Post</a>
                                        </li>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Auth::user()->can('news.add'))
                                        <li>
                                            <a href="{{ route('admin.newsPost.create') }}">Create News Post</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->can('banner.menu'))
                        <li>
                            <a href="#banner" data-bs-toggle="collapse">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span> Banner </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="banner">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.banner.index') }}">Banner</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->can('photo.menu'))
                        <li>
                            <a href="#photoGallery" data-bs-toggle="collapse">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span> Photo Gallery </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="photoGallery">
                                <ul class="nav-second-level">
                                    @if(\Illuminate\Support\Facades\Auth::user()->can('photo.list'))
                                        <li>
                                            <a href="{{ route('admin.photogallery.index') }}">Photo Gallery</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->can('video.menu'))
                        <li>
                            <a href="#videoGallery" data-bs-toggle="collapse">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span> Video Gallery </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="videoGallery">
                                <ul class="nav-second-level">
                                    @if(\Illuminate\Support\Facades\Auth::user()->can('video.list'))
                                        <li>
                                            <a href="{{ route('admin.videogallery.index') }}">Video Gallery</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->can('live.menu'))
                        <li>
                            <a href="#livetv" data-bs-toggle="collapse">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span> Live TV </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="livetv">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.livetv.index') }}">Live TV</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->can('review.menu'))
                        <li>
                            <a href="#review" data-bs-toggle="collapse">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span> Review </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="review">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.review.pending') }}">Pending Review</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.review.approved') }}">Approve Review</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->can('seo.menu'))
                        <li>
                            <a href="#seo" data-bs-toggle="collapse">
                                <i class="mdi mdi-format-list-bulleted"></i>
                                <span> Seo </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="seo">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.seo.index') }}">Seo</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    <li class="menu-title mt-2">Setting</li>

                    @if(\Illuminate\Support\Facades\Auth::user()->can('setting.menu'))
                        <li>
                            <a href="#sidebarAuth" data-bs-toggle="collapse">
                                <i class="mdi mdi-account-circle-outline"></i>
                                <span> Admin User </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarAuth">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.user.index') }}">Admin</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.user.create') }}">Create Admin</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->can('role.menu'))
                        <li>
                            <a href="#rolesPermission" data-bs-toggle="collapse">
                                <i class="mdi mdi-text-box-multiple-outline"></i>
                                <span> Roles And Permission </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="rolesPermission">
                                <ul class="nav-second-level">
                                    <li>
                                        <a href="{{ route('admin.permission.index') }}">Permissions</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.role.index') }}">Roles</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.role-permission.index') }}">All Roles in Permission</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.role-permission.create') }}">Roles in Permission</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endif

                @else
                @endif

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
