@extends('frontend.layouts.master')
@section('title', 'Plotfinder - Property Details')
@section('body-content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Property Detail</h2>
                    <ol>
                        <li><a href="{{ route('frontend.index') }}">Home</a></li>
                        <li>Property</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <section class="our-client section-padding best-selling">
            <div class="listing-area pt-30 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-7 mr-5">
                            <div class="p-4">
                                <img class="img-fluid"
                                    src="{{ !is_null($property->image) ? url('Uploads/property/' . $property->image) : asset('frontend/assets/img/portfolio/services1.png') }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 ml-5 pl-5">
                            <div>
                                <div>
                                    <h5>{{ isset($property->title) ? $property->title : '' }}</h5>
                                </div>
                                <div>
                                    <span style="font-weight:bold">Category: </span>
                                    <span
                                        style="padding:1px 8px; background-color:rgb(66, 238, 13);color: white; border-radius: 5px;">{{ $property['category']['name'] }}</span>
                                </div>
                                <div>
                                    <h6 style="padding-top:15px;margin-bottom:0px">Descriptions: </h6>
                                    <div>
                                        <p>{!! $property['description'] !!}</p>
                                    </div>
                                </div>
                                <div class="Prices" style="margin: 10px 0px;">
                                    <span style="font-weight:bold;">Availablity: </span>
                                    <span
                                        style="padding:1px 8px; background-color:rgb(245, 34, 69);color: white; border-radius: 5px;">In
                                        Stock</span>
                                </div>
                                <div class="Prices" style="margin: 15px 0px;">
                                    <span style="font-weight:bold;;">Price: Rs. </span>
                                    <span>{{ number_format($property->price) }}</span>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="listing-area pt-30 pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mb-40">
                            <h4>Additional Info.</h4>
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="latest-items latest-items2">
                            <div class="row mt-3">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Size Square Meter</th>
                                        <td>{{ isset($property->size_square_meter) ? $property->size_square_meter . ' mm' : 'N/L' }}
                                        </td>
                                        <th>Lot Size</th>
                                        <td>{{ isset($property->lot_size) ? $property->lot_size . ' mm' : 'N/L' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Listed In</th>
                                        <td>
                                            <div
                                                style="padding:1px 8px; background-color:rgb(14, 67, 241);color: white; border-radius: 5px;">
                                                {{ isset($property->listed_in) ? $property->listed_in : '' }}</div>
                                        </td>
                                        <th>Country</th>
                                        <td>{{ isset($property->country) ? $property->country : 'N/L' }}</td>
                                    </tr>
                                    <tr>
                                        <th>State</th>
                                        <td>{{ isset($property->state) ? $property->state : 'N/L' }}</td>
                                        <th>City</th>
                                        <td>{{ isset($property->city) ? $property->city : 'N/L' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Apartment</th>
                                        <td>{{ isset($property->apartment) ? $property->apartment : 'N/L' }}</td>
                                        <th>Address</th>
                                        <td>{{ isset($property->address) ? $property->city : 'N/L' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Rooms</th>
                                        <td>{{ isset($property->rooms) ? $property->rooms : 'N/L' }}</td>
                                        <th>Kitchen</th>
                                        <td>{{ isset($property->kitchen) ? $property->kitchen : 'N/L' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bedrooms</th>
                                        <td>{{ isset($property->bedrooms) ? $property->bedrooms : 'N/L' }}</td>
                                        <th>Bathrooms</th>
                                        <td>{{ isset($property->bathrooms) ? $property->bathrooms : 'N/L' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Garages</th>
                                        <td>{{ isset($property->garages) ? $property->garages : 'N/L' }}</td>
                                        <th>Garage size</th>
                                        <td>{{ isset($property->garage_size) ? $property->garage_size : 'N/L' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Build date</th>
                                        <td>{{ isset($property->build_date) ? $property->build_date : 'N/L' }}</td>
                                        <th>Available date</th>
                                        <td>{{ isset($property->available_date) ? $property->available_date : 'N/L' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Basement</th>
                                        <td>{{ isset($property->basement) ? $property->basement : 'N/L' }}</td>
                                        <th>Roofing</th>
                                        <td>{{ isset($property->roofing) ? $property->roofing : 'N/L' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Balcony</th>
                                        <td>{{ isset($property->balcony) && $property->balcony == 1 ? 'Yes' : 'No' }}
                                        </td>
                                        <th>Garden</th>
                                        <td>{{ isset($property->garden) && $property->garden == 1 ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Chair Accessible</th>
                                        <td>{{ isset($property->chair_accessible) && $property->chair_accessible == 1 ? 'Yes' : 'No' }}
                                        </td>
                                        <th>Doorman</th>
                                        <td>{{ isset($property->doorman) && $property->doorman == 1 ? 'Yes' : 'No' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Elevator</th>
                                        <td>{{ isset($property->elevator) && $property->elevator == 1 ? 'Yes' : 'No' }}
                                        </td>
                                        <th>Front yard</th>
                                        <td>{{ isset($property->front_yard) && $property->front_yard == 1 ? 'Yes' : 'No' }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h3><span>Contact Us</span></h3>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>Bosan Rd, Bahauddin Zakariya University, Multan, Punjab 60000</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>plotsfinder@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+92 303 8975708</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </main><!-- End #main -->

@endsection
