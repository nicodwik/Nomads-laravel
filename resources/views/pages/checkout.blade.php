@extends('layouts.checkout')

@section('title', 'Checkout')

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
                                <li class="breadcrumb-item">Details</li>
                                <li class="breadcrumb-item active" style="font-weight: bold; color: #071C4D;">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details" S>
                            <h2>Who is Going?</h2>
                            <p>Trip to {{$item->travel_package->title}}, {{$item->travel_package->country}}</p>

                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Picture</td>
                                            <td>name</td>
                                            <td>Nationality</td>
                                            <td>VISA</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                        <tr>
                                            <td>
                                                <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" class="rounded-circle" width="30">
                                            </td>
                                            <td class="align-middle">{{$detail->username}}</td>
                                            <td class="align-middle">{{$detail->nationality}}</td>
                                            <td class="align-middle">{{$detail->is_visa ? '30 Days' : 'N/A'}}</td>
                                            {{-- <td class="align-middle">{{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}</td> --}}
                                            <td class="align-middle">
                                                <a href="{{ route('checkout-remove', $detail->id) }}">
                                                    <img src="{{url('frontend/images/ic_remove.png')}}" alt="">
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-danger">No Visitor</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="member mt-3">
                                    <h2>Add Member</h2>
                                    <form class="form-inline" action="{{route('checkout-create', $item->id)}}" method="post">
                                        @csrf
                                        <label for="username" class="sr-only"></label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" name="username" id="username" placeholder="Username">

                                        <label for="nationality"></label>
                                        <input type="text" name="nationality" id="nationality" class="form-control mb-2 mr-sm-2" placeholder="Nationality" style="width: 50px">
                                        <label for="is_visa" class="sr-only"></label>
                                        <select name="is_visa" id="inputVisa" class="custom-select mb-2 mr-sm-2" required>
                                            <option value="" selected>VISA</option>
                                            <option value="1" selected>30 Days</option>
                                            <option value="0">N/A</option>
                                        </select>

                                        <label for="doe_passport" class="sr-only">DOE Passport</label>
                                        <div class="input-group mb-2 mr-sm-2" style="width: 200px">
                                            {{-- <input type="text" class="form-control datepicker" id="doe_passport" name="doe_passport" placeholder="DOE Passport"> --}}
                                        </div>

                                        <button type="submit" class="btn btn-add-now mb-2 px-4">Add Now</button>
                                    </form>
                                    <h3 class="mt-2 mb-0" style="font-weight: 600; font-size: 14px;">Note</h3>
                                    <p class="mb-0" style="font-weight: 300; font-size: 14px; color: #B1B1B1;">You are only able to invite member that has registered in Nomads.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="card card-details card-right ">
                            <h2 style="font-size: 20px;">Checkout Information</h2>
                            <table class="trip-informations ">
                                <tr>
                                    <th width="50% ">Members</th>
                                    <td width="50% " class="text-right ">{{$item->details->count()}}</td>
                                </tr>
                                <tr>
                                    <th width="50% ">Additional VISA</th>
                                    <td width="50% " class="text-right ">{{$item->additional_visa}}</td>
                                </tr>
                                <tr>
                                    <th width="50% ">Trip Price</th>
                                    <td width="50% " class="text-right ">$ {{$item->travel_package->price}} / person</td>
                                </tr>
                                <tr>
                                    <th width="50% ">Sub Total</th>
                                    <td width="50% " class="text-right ">$ {{$item->transaction_total}}</td>
                                </tr>
                                <tr>
                                    <th width="50% ">Total (+Unique Code)</th>
                                    <td width="50% " class="text-right text-total">
                                        <span style="font-weight: bold; color: #071C4D;">$ {{$item->transaction_total}},</span>
                                        <span style="font-weight: bold; color: #FF9E53;">{{mt_rand(0,99)}}</span>
                                    </td>
                                </tr>
                            </table>
                            <hr>
                            <h2 style="font-weight: 500; font-size: 20px;">Payment Instructions</h2>
                            <p style="font-weight: 300; font-size: 14px;">Please complete your payment before to continue the wonderful trip
                            </p>
                            <div class="bank">
                                <div class="bank-item pb-3">
                                    <img src="{{url('frontend/images/ic_bank.png')}}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT Nomads ID</h3>
                                        <p>0881 8829 8800 <br> Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-3">
                                    <img src="{{url('frontend/images/ic_bank.png')}}" alt="" class="bank-image">
                                    <div class="description">
                                        <h3>PT Nomads ID</h3>
                                        <p>0899 8501 7888 <br> Bank HSBC
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container ">
                            <a href="{{route('checkout-success', $item->id)}}" class="btn btn-block btn-join-now py-2 ">I Have Made payment</a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('details', $item->travel_package->slug)}}" style="color: #BFBFBF;">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url ('frontend/libraries/gijgo/css/gijgo.min.css')}}">
@endpush

@push('addon-script')
    <script src="{{url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<img src="{{url('frontend/images/ic_doe.png')}}" />'
                }
            })
        });
    </script>
@endpush