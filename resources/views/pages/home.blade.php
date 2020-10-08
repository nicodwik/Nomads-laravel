@extends('layouts.app')

@section('title')
    NOMADS
@endsection

@section('content')
    <!-- Header -->
    <header class="text-center">
        <h1>
            Explore The Beautiful World
            <br> As Easy One Click
        </h1>
        <p class="mt-5">
            You will see beautiful
            <br> moment you never see before
        </p>
        <a href="#sectionPopular" class="btn btn-get-started px-4 mt-5">Get Started</a>
    </header>

    <!-- statistics -->
    <main>
        <div class="container">
            <section class="section-stats row justify-content-center text-center" id="stats">
                <div class="col-3 col-md-2 stats-detail" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                    <h2>20K</h2>
                    <p>Members</p>
                </div>
                <div class="col-3 col-md-2 stats-detail ">
                    <h2>12</h2>
                    <p>Countries</p>
                </div>
                <div class="col-3 col-md-2 stats-detail ">
                    <h2>3K</h2>
                    <p>Hotels</p>
                </div>
                <div class="col-3 col-md-2 stats-detail" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
                    <h2>72</h2>
                    <p>partners</p>
                </div>
            </section>
        </div>
        <!-- popular-heading -->
        <section class="section-popular" id="sectionPopular">
            <div class="row">
                <div class="col text-center section-popular-heading">
                    <h2>Wisata Popular</h2>
                    <p class="mt-2">
                        Something that you never try
                        <br> before in this world
                    </p>
                </div>
            </div>
        </section>

        <!-- popular-content -->
        <section class="section-popular-content">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                   @foreach ($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column" style="background-image: url('{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                                <div class="travel-country">{{$item->country}}</div>
                                <div class="travel-location">{{$item->title}}</div>
                                <div class="travel-button mt-auto">
                                    <a href="{{route('details', $item->slug)}}" class="btn btn-travel-details px-4">View Details</a>
                                </div>
                            </div>
                        </div>
                   @endforeach
                </div>
            </div>
        </section>

        <!-- networks -->
        <section class="section-networks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Our Networks</h2>
                        <p>
                            Companies are trusted us
                            <br>more than just a trip
                        </p>
                    </div>
                    <div class="col-md-8">
                        <img src="frontend/images/logos_partner.png" alt="partner logo">
                    </div>
                </div>
            </div>
        </section>

        <!-- testimonial -->
        <section class="testimonial-heading">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>They Are Loving Us</h2>
                        <p>
                            Moments were giving them
                            <br> the best experience
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- testimonial content -->
        <section class="section-testimonial-content">
            <div class="container">
                <div class="popular-travel row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testimonial-1.jpg" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Nico Dwi Kuswanto</h3>
                                <p class="testimonal">
                                    “ It was glorious and I could not stop to say wohooo for every single moment Dankeeeeee “
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Ubud
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testimonial-2.jpg" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Shayna</h3>
                                <p class="testimonal">
                                    “The trip was amazing and I saw something beautiful in that Island that makes me want to learn more“
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Nusa Penida
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testimonial-3.jpg" alt="User" class="mb-4 rounded-circle">
                                <h3 class=" mb-4">Shabrina</h3>
                                <p class="testimonal">
                                    “ I loved it when the waves was shaking harder — I was scared too “
                                </p>
                            </div>
                            <hr>
                            <p class="trip-to mt-2">
                                Trip to Karimun Jawa
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a href="#" class="btn btn-help px-4 mt-5 mx-1">Help</a>
                        <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-5 mx-1">Get Started</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection