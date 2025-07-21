@section('sidebar')

@php
    $current_route=request()->route()->getName();
@endphp

<div class="ttr-sidebar">
    <div class="ttr-sidebar-wrapper content-scroll">
        <!-- side menu logo start -->
        <div class="ttr-sidebar-logo" style="margin-top: -50px">
           {{--  <div class="ttr-sidebar-toggle-button">
                    <i class="ti-arrow-left"></i>
            </div> --}}
        </div>
        <!-- side menu logo end -->

        <!-- sidebar menu start -->
        <nav class="ttr-sidebar-navi">
            <ul>
                <li>
                    <a href="{{ route('admin-dashboard') }}" class="ttr-material-button {{$current_route=='admin-dashboard'?'active':''}}">
                        <span class="ttr-icon"><i class="ti-home"></i></span>
                        <span class="ttr-label">Dashborad</span>
                    </a>
                </li>
                <li class="active">
                    <a href="{{ route('admin-user') }}" class="ttr-material-button {{$current_route=='admin-user'?'active':''}}">
                        <span class="ttr-icon"><i class="ti-user"></i></span>
                        <span class="ttr-label">User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-file') }}" class="ttr-material-button {{$current_route=='admin-file'?'active':''}} {{$current_route=='admin-createFile'?'active':''}}">
                        <span class="ttr-icon"><i class="ti-file"></i></span>
                        <span class="ttr-label">Upload File</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-articles') }}" class="ttr-material-button {{$current_route=='admin-articles'?'active':''}} {{$current_route=='admin-articleContent'?'active':''}} {{$current_route=='admin-createArticles'?'active':''}} {{$current_route=='admin-editArticles'?'active':''}}"> 
                        <span class="ttr-icon"><i class="ti-book"></i></span>
                        <span class="ttr-label">Articles</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-subMenu') }}" class="ttr-material-button {{$current_route=='admin-subMenu'?'active':''}} {{$current_route=='admin-subContent'?'active':''}} {{$current_route=='admin-createSubmenu'?'active':''}} {{$current_route=='admin-editSubmenu'?'active':''}}">
                        <span class="ttr-icon"><i class="ti-menu"></i></span>
                        <span class="ttr-label">Sub Menu</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-subLink') }}" class="ttr-material-button {{$current_route=='admin-subLink'?'active':''}} {{$current_route=='admin-sublinkContent'?'active':''}} {{$current_route=='admin-createSubLink'?'active':''}} {{$current_route=='admin-editSublink'?'active':''}}">
                        <span class="ttr-icon"><i class="ti-link"></i></span>
                        <span class="ttr-label">Sub Link</span>
                    </a>
                </li>
                
                <li class="ttr-seperate"></li>
            </ul>
            <!-- sidebar menu end -->
        </nav>
        <!-- sidebar menu end -->
    </div>
</div>
@endsection