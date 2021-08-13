<header class="header">
  <!-- Topbar -->
  <div class="topbar">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-8 col-12 d-flex align-items-center">
          <!-- Top Contact -->
          <ul class="top-contact">
            <li><i class="fas fa-map-marker-alt"></i>हात्तीसार, कठमाण्डौ, नेपाल</li>
            <li><i class="fa fa-phone"></i>नेपाल फोन:<a href="tel:+977 01-5524414">+९७७ ०१-५५२४४१४</a></li>
            <li><a href="mailto: dfoktm@gmail.com"><i class="fa fa-envelope"></i>dfoktm@gmail.com</a></li>
            <li><i class="fa fa-calendar"></i>{{ TodayDate::nepali() }}</li>
          </ul>
          <!-- End Top Contact -->
        </div>
        <div class="col-lg-3 col-md-4 col-12">
          <!-- Contact -->
          <ul class="top-link">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li>
              @guest
              <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item text-dark" target="_blank" href="{{ route('voyager.login') }}">Login</a>
                </div>
              </div>
              @else
              <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item text-dark" href="{{ route('voyager.dashboard') }}">Dashboard</a>
                  <a class="dropdown-item text-dark" href="{{ route('voyager.logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout
                  </a>
                  <form id="logout-form" action="{{ route('voyager.logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </div>
              @endguest
            </li>

          </ul>
          <!-- End Contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Topbar -->
  <div class="container p-0" style="position: relative;">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-4 col-4">
        <div class="nepal-flag" style="height: 87px; float:left;">
          <img src="/images/nepal_emblem_new.gif" alt="" style="height: 100%">
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-9" style="display: inline-block;">
        <!-- Start Logo -->
        <div class="logo" style="height: 70px; padding-left:12px">
          <a href="#">
            <div class="dfo-logo">
              <div class="logo-desc">
                <span class="logo-address">प्रदेश सरकार - उध्योग, पर्यटन, वन तथा वातावरण मन्त्रालय</span>
                <span class="logo-address">प्रदेश वन निर्देशनालय</span>
                <span class="logo-title">डिभिजन वन कार्यलय, काठमाण्डौ</span>
                <span class="logo-address">बाग्मती प्रदेश, नेपाल</span>
              </div>
            </div>
          </a>
        </div>

        <!-- End Logo -->

        <!-- Mobile Nav -->
        <!-- End Mobile Nav -->
      </div>
      <div class="col-lg-4 col-4">
        <div class="nepal-flag" style="height: 87px; float:right;">
          <img src="/images/forest_image.jpeg" alt="" style="height: 100%">
        </div>
      </div>
    </div>


  </div>

  <!-- Header Inner -->
  <div class="header-inner">
    <div class="container">
      <div class="inner">
        <div class="row">
          <div class="col-12">
            <!-- Main Menu -->
            <div class="main-menu">
              <nav class="navigation">
                <ul class="nav menu d-flex justify-content-center">
                  @foreach (menu('dfo-kathmandu','_json') as $item)
                  <li class="{{ checkActive($item) }}">
                    <a href="{{$item->url}}">{{$item->title}} @if(!$item->children->isEmpty())<i
                        class="icofont-rounded-down"></i>@endif</a>
                    @if(!$item->children->isEmpty())
                    <ul class="dropdown">
                      @foreach ($item->children as $subitem)
                      <li><a href="{{$subitem->url}}">{{$subitem->title}}</a>
                        @endforeach
                    </ul>
                    @endif
                  </li>
                  @endforeach
                </ul>
              </nav>
            </div>
            <!--/ End Main Menu -->
          </div>
          <div class="mobile-nav" style="width: 100%; padding-right: 20px; background: #1453B4">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ End Header Inner -->
</header>
{{-- marquee section --}}
<div class="p-0 d-flex" style="height: 45px; background:#e4e4e4" role="alert">
  <div class="container d-flex">
    <div class="mynotice container-fluid px-0 d-flex align-items-center position-relative">
      <marquee onmouseover="this.stop()" onmouseout="this.start()">
        @foreach (\App\Lists::where('latest_notice',1)->orderBy('created_at','desc')->get() as $item)
        @php
        $url = '#';
        if(!empty(json_decode($item->file))){
        $url = '/storage/'.json_decode($item->file)[0]->download_link;
        $target = '_blank';
        }

        if($item->body){
        $url = '/d/'.$item->category->slug.'?id='.$item->id;
        $target = '_self';
        }
        @endphp
        <a href="{{$url}}" target="{{ $target }}">&#10070; {{$item->title}}</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        @endforeach

      </marquee>
      <span class="invi">

      </span>
      <div class="notice position-absolute d-flex align-items-center px-3"
        style="background:#b72f2c; color:white; top:0; height:100%">
        <span>सुचना</span>
      </div>
    </div>


  </div>
</div>
{{-- end of marquee section --}}

@php
function checkActive($menu){

// for homepage
if(Request::segment(1)==null && $menu->url=='/'){
return 'active';
}

// generating slug equivalent to menu->url
$temp_slug = '/'.Request::segment(1).'/'.Request::segment(2);

// for menu without and submenu
if($menu->url==$temp_slug){
return 'active';
}

// for menu with submenu
if($menu->children->where('url',$temp_slug)->first()){
return 'active';
}



}
@endphp
