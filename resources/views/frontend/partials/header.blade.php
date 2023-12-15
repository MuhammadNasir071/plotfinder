<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:plotsfinder@gmail.com">plotsfinder@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+92 303 8975708</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="https://www.facebook.com/plotsfinder?mibextid=9R9pXO" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.Instagram.com/plots.finder" class="instagram"><i class="bi bi-instagram"></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      {{-- <h1 class="logo"><a href="index.html">BizLand<span>.</span></a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ route('frontend.index') }}" class="logo"><img src="{{asset('frontend/assets/img/logo.png')}}" alt=""></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ route('frontend.index') }}">HOME</a></li>
          <li class="dropdown"><a href="#"><span>CATEGORIES</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                @if(isset($categories) && count($categories) > 0)
                    @foreach($categories as $category)
                        <li><a  style="color:black" href="{{ route('frontend.categories', $category->id) }}">{{$category['name']}}</a></li>
                    @endforeach
                @endif
            </ul>
          </li>
          {{-- <li><a class="nav-link scrollto" href="#services"></a></li> --}}
          <li><a class="nav-link scrollto" href="{{route('frontend.contactUs')}}">CONTACT</a></li>

          <li><a class="nav-link scrollto" href="{{route('login')}}">SIGNIN</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
