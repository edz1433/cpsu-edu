@section('header')
<!--====== HEADER PART START ======-->
<header id="header-part">        
    {{-- <div class="navigation {{ request()->is('/') ? 'navigation-2 navigation-3' : '' }}"> --}}
        <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 col-md-11 col-sm-9 col-8">
                    <nav class="navbar navbar-expand-lg navigation">
                        <a class="navbar-brand" href="#" style="width: 100px; padding-right: 15px;">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="wrap-submenu">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="" href="index.html">ABOUT <i class="fa fa-chevron-right fa-xs submenu-icon"></i></a>
                                        <ul class="sub-menu">
                                        <!-- Column 1 -->
                                        <li>
                                            <strong>University Info</strong>
                                            <ul>
                                            <li><a href="#">The Story of CPSU</a></li>
                                            <li><a href="#">Vision and Mission</a></li>
                                            <li><a href="#">Quality Policy</a></li>
                                            <li><a href="#">Awards and Citations</a></li>
                                            <li><a href="#">Calendar of Activities</a></li>
                                            </ul>
                                        </li>

                                        <!-- Column 2 -->
                                        <li>
                                            <strong>Leadership & Governance</strong>
                                            <ul>
                                            <li><a href="#">Annual Reports</a></li>
                                            <li><a href="#">Board of Trustees</a></li>
                                            <li><a href="#">News & Events</a></li>
                                            <li><a href="#">Career Opportunities</a></li>
                                            <li><a href="#">Campus Map</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            </ul>
                                        </li>

                                        <!-- Column 3 -->
                                        <li>
                                            <strong>Campuses</strong>
                                            <ul>
                                                <li><a href="courses-singel.html">Hinoba-an</a></li>
                                                <li><a href="courses-singel.html">Sipalay</a></li>
                                                <li><a href="courses-singel.html">Cauayan</a></li>
                                                <li><a href="courses-singel.html">Candoni</a></li>
                                                <li><a href="courses-singel.html">Ilog</a></li>
                                                <li><a href="courses-singel.html">Hinigaran</a></li>
                                                <li><a href="courses-singel.html">Moises Padilla</a></li>
                                                <li><a href="courses-singel.html">Valladolid</a></li>
                                                <li><a href="courses-singel.html">San Carlos</a></li>
                                                <li><a href="courses-singel.html">Victorias</a></li>
                                            </ul>
                                        </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="" href="#">ADMISSIONS <i class="fa fa-chevron-right fa-xs submenu-icon"></i></a> 
                                        <ul class="sub-menu has-grid">
                                            <!-- Column 1 -->
                                            <li>
                                                <strong>Start Your CPSU Journey!</strong>
                                                <ul>
                                                    <li><a target="_blank" href="https://ciss.cpsu.edu.ph/portal">Apply</a></li>
                                                    <li><a href="#">Enrollment FAQs</a></li>
                                                </ul>
                                            </li>

                                            <!-- Column 2 -->
                                            <li>
                                                <strong>Quick Info</strong>
                                                <ul>
                                                    <li><a href="#">Offerings</a></li>
                                                    <li><a href="#">Undergraduate Programs</a></li>
                                                    <li><a href="#">Graduate Programs</a></li>
                                                </ul>
                                            </li>

                                            <!-- Column 3 -->
                                            <li>
                                                <strong>Cost and Aid</strong>
                                                <ul>
                                                    <li><a href="#">Scholarship Grants</a></li>
                                                    <li><a href="#">Financial Assistance Service Partnerships</a></li>
                                                    {{-- <li><a href="#">Tuition and Fees Payment Guide</a></li> --}}
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item has-grid">
                                        <a href="about.html">ADMINISTRATION <i class="fa fa-chevron-right fa-xs submenu-icon"></i></a>
                                        <ul class="sub-menu has-grid">
                                            <li>
                                                <ul>
                                                    <li><a href="#">Administrative Council</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li><a href="#">Organizational Structure</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <ul>
                                                    <li><a href="#">Organizational Structure</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item has-grid">
                                        <a href="events.html">INTERNATIONAL AFFAIRS</a>
                                    </li>
                                    <li class="nav-item has-grid">
                                        <a href="teachers.html">RESEARCH AND EXTENSION</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-2 col-3">
                    <div class="right-icon text-right">
                        <ul>
                            <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->
<div class="search-box">
    <div class="serach-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="#">
            <input type="text" placeholder="Search by keyword">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>
<!--====== SEARCH BOX PART ENDS ======-->
@endsection
