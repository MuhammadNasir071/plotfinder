@extends('frontend.layouts.master')

@section('body-content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Welcome to <span>PLOTSFINDER</span></h1>
            <h2>Get the latest Property updates, real estate Projects and News</h2>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
            </div>
           <form method="post" action="{{ route('frontend.search.property') }}">
            @csrf
                <div class="row mt-5 p-3 search_inputs">
                    <div class="col-md-3">
                        <input type="search" name="title" class="w-100 ps-2 py-2" style="border-radius: 8px" placeholder="Property title...">
                    </div>
                    <div class="col-md-3">
                        <input type="search" name="city" class="w-100 ps-2 py-2" style="border-radius: 8px" placeholder="Search by city...">
                    </div>
                    <div class="col-md-3">
                        <input type="search" name="country" class="w-100 ps-2 py-2" style="border-radius: 8px" placeholder="Search by country...">
                    </div>
                    <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-lg w-100 py-2">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Properties</h2>
                    <h3>Check our <span>Properties</span></h3>
                </div>

                <div class="row">
                    @if (isset($properties) && count($properties) > 0)
                        @foreach ($properties as $property)
                            <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0">
                                <div class="card" style="width: 18rem;">
                                    <a href="{{ route('frontend.property.details', $property->id) }}">
                                        <img src="{{ !is_null($property->image) ? url('Uploads/property/'.$property->image) : asset('frontend/assets/img/portfolio/services1.png') }}" alt=""
                                        style="width: 100%;height:auto">
                                        <div class="card-body">
                                            <div class="card-text">{{ isset($property->title) ? $property->title : "" }}</div>
                                            <div class="fw-bold text-black">Price: {{ isset($property->price) ? 'Rs. '.number_format($property->price) : "" }}</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        Sorry! There is no property found of selected category.
                    @endif
                </div>
            </div>
        </section>
        <!-- End Featured Services Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Services</h2>
                    <h3>Check our <span>Services</span></h3>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="">
                                <img src="{{ asset('frontend/assets/img/portfolio/services1.png') }}" alt=""
                                    style="width: 100%;height:auto">
                            </div>
                            <h4 class="pt-3">Real Estate Listing</h4>
                            <p>Look at the best property around you!</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                        data-aos-delay="200">
                        <div class="icon-box">
                            <div class="">
                                <img src="{{ asset('frontend/assets/img/portfolio/services2.png') }}" alt=""
                                    style="width: 100%;height:auto">
                            </div>
                            <h4 class="pt-3">New Projects</h4>
                            <p>Explore up-and-coming venture for max property!</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in"
                        data-aos-delay="300">
                        <div class="icon-box">
                            <div class="">
                                <img src="{{ asset('frontend/assets/img/portfolio/services3.png') }}" alt=""
                                    style="width: 100%;height:auto">
                            </div>
                            <h4 class="pt-3">Plot Finder</h4>
                            <p>Easily explore verious plots in different socities!</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

    </main><!-- End #main -->
@endsection
