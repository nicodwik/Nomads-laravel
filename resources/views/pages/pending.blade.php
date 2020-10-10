@extends('layouts.success')

@section('title', 'Checkout Success')

@section('content')
    <main>
        <div class="section-success d-flex align-items-center" style="height: 90vh;">
            <div class="col text-center">
                <h1 style="font-size: 26px; font-weight: 600;">Oops! Something Wrong. Please contact us</h1>
                <a href="{{route('home')}}" class="btn btn-home-page mt-3 px-5">Homepage</a>
            </div>
        </div>
    </main>
@endsection