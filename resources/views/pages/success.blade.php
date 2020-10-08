@extends('layouts.success')

@section('title', 'Checkout Success')

@section('content')
    <main>
        <div class="section-success d-flex align-items-center" style="height: 90vh;">
            <div class="col text-center">
                <img src="{{url('frontend/images/ic_mail.png')}}" alt="">
                <h1 style="font-size: 26px; font-weight: 600;">Yay! Succeess</h1>
                <p style="font-size: 18px; font-weight: 300; color: #B1B1B1;">We’ve sent you email for trip instruction <br> please read it as well
                </p>
                <a href="{{route('home')}}" class="btn btn-home-page mt-3 px-5">Homepage</a>
            </div>
        </div>
    </main>
@endsection