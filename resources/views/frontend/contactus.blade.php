@extends('frontend.layouts.master')
@section('title', 'Plotfinder - Contact Us')
@section('body-content')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h3><span>Contact Us</span></h3>
                <p>Get in touch with us by filling out the form below. We're always happy to hear from you and will get back
                    to you as soon as possible..</p>
            </div>
            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            <div class="row" data-aos="fade-up" data-aos-delay="100">
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

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6 ">
                    {{-- <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe> --}}
                    <img src="{{ asset('frontend/assets/img/contact_side_pic.png') }}" alt="">
                </div>

                <div class="col-lg-6">
                    <form action="{{ route('frontend.contactUs.save') }}" method="post" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="col form-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name">
                                @error('name')
                                <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email">
                                @error('email')
                                <p style="color:red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                            @error('subject')
                            <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                            @error('message')
                                <p style="color:red">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="text-center"><button type="submit">Send Message</button></div>
                    </form>
                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Section -->
@endsection
