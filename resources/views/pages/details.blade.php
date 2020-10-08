@extends('layouts.app')

@section('title')
    Details Page
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush

@section('content')
    <main>
        <section class="section-details-header" style="min-height: 310px; background-color: #E4E6EB; margin-top: -70px;">
        </section>
        <section class="section-details-content" style="margin-top: -210px; min-height: 100vh;">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb mb-4" style="background-color: transparent; padding: 0px;">
                                <li class="breadcrumb-item">Paket Travel</li>
                                <li class="breadcrumb-item active" style="font-weight: bold; color: #071C4D;">Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                            <h2>{{$item->title}}</h2>
                            <p>{{$item->country}}</p>

                            @if ($item->galleries->count())
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="{{Storage::url($item->galleries->first()->image)}}" class="xzoom" id="xzoom-default" xoriginal="{{Storage::url($item->galleries->first()->image)}}">
                                </div>
                            @endif
                                <div class="xzoom-thumbs" style="margin-left: 0px;">
                                    <a href="frontend/images/pic_featured.jpg">
                                        <img src="frontend/images/pic_featured.jpg" width="160" class="xzoom-gallery" xpreview="frontend/images/pic_featured.jpg" style="margin-left: 0px;">
                                    </a>
                                    <a href="frontend/images/pic-1.jpg">
                                        <img src="frontend/images/pic-1.jpg" width="160" class="xzoom-gallery" xpreview="frontend/images/pic-1.jpg">
                                    </a>
                                    <a href="frontend/images/pic-2.jpg">
                                        <img src="frontend/images/pic-2.jpg" width="160" class="xzoom-gallery" xpreview="frontend/images/pic-2.jpg">
                                    </a>
                                    <a href="frontend/images/pic-3.jpg">
                                        <img src="frontend/images/pic-3.jpg" width="160" class="xzoom-gallery" xpreview="frontend/images/pic-3.jpg">
                                    </a>
                                </div>
                            </div>

                            <h3>Tentang Wisata</h3>
                            <p>{!! $item->description !!}</p>
                        
                            <div class="features row">
                                <div class="col-md-4 border-right">
                                    <div class="features-description">
                                        <div class="features-image"></div>
                                        <img src="{{url('frontend/images/event.png')}}" alt="" style="overflow: hidden; float: left;">
                                        <div class="features-description" style="margin-left: 10px;">
                                            <h5>Featuted Event</h5>
                                            <p>{{$item->featured_event}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 border-right">
                                    <div class="features-description">
                                        <img src="{{url('frontend/images/language.png')}}" alt="" style="overflow: hidden; float: left; ">
                                        <div class="features-description " style="margin-left: 10px; ">
                                            <h5>Language</h5>
                                            <p>{{$item->language}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="features-description ">
                                        <img src="{{url('frontend/images/foods.png')}}" alt="" style="overflow: hidden; float: left; ">
                                        <div class="features-description " style="margin-left: 10px;">
                                            <h5>Foods</h5>
                                            <p>{{$item->foods}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Members Are Going</h2>
                            <div class="members my-2">
                                <img class="mr-1 image" src="{{url('frontend/images/member-1.png')}}" alt="">
                                <img class="mr-1 image" src="{{url('frontend/images/member-2.png')}}" alt="">
                                <img class="mr-1 image" src="{{url('frontend/images/member-3.png')}}" alt="">
                                <img class="mr-1 image" src="{{url('frontend/images/member-4.png')}}" alt="">
                                <img class="mr-1 image" src="{{url('frontend/images/member-5.png')}}" alt="">
                            </div>
                            <hr>
                            <h2>Trip Information</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Date of Depatures</th>
                                    <td width="50%" class="text-right">{{ \Carbon\Carbon::create($item->depature_date)->format('F n, Y') }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Duration</th>
                                    <td width="50%" class="text-right">{{ $item->duration }}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Type</th>
                                    <td width="50%" class="text-right">{{$item->type}}</td>
                                </tr>
                                <tr>
                                    <th width="50%">Price</th>
                                    <td width="50%" class="text-right">${{$item->price}}.00 / person</td>
                                </tr>
                            </table>
                        </div>
                        
                        @auth
                            <form action="{{ route('checkout-process', $item->id) }}" class="form-group" method="post">
                            @csrf
                            <div class="join-container">
                                <button class="btn btn-block btn-join-now py-2" type="submit">Join Now</button>
                            </div>
                        </form>
                        @endauth
                        @guest
                        <div class="join-container">
                            <a href="{{route('login')}}" class="btn btn-block btn-join-now py-2">Login or Register to Continue</a>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('addon-script')
    <script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({
                zoomWidth: 500,
                title: false,
                tint: '#333',
                Xoffset: 15
            });
        });
    </script>
@endpush