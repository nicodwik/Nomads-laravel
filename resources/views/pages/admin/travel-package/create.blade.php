@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Paket Travel</h1>
                
            </div>

            {{-- Error Message --}}
            @if ($errors->any())
                <div class="alret alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="card-shadow">
                <div class="card-body">
                    <form action="{{route('travel-package.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="title" placeholder="Title" class="form-control" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="country" placeholder="country" class="form-control" value="{{old('country')}}">
                        </div>
                        <div class="form-group">
                            <textarea name="description" id="" cols="30" rows="10" placeholder="description" class="form-control w-100 d-block">{{old('description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="featured_event" placeholder="featured_event" class="form-control" value="{{old('featured_event')}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="language" placeholder="language" class="form-control" value="{{old('language')}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="food" placeholder="food" class="form-control" value="{{old('food')}}">
                        </div>
                        <div class="form-group">
                            <input type="date" name="depature_date" placeholder="depature date" class="form-control" value="{{old('depature_date')}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="duration" placeholder="duration" class="form-control" value="{{old('duration')}}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="type" placeholder="type" class="form-control" value="{{old('type')}}">
                        </div>
                        <div class="form-group">
                            <input type="number" name="price" placeholder="price" class="form-control" value="{{old('price')}}">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                    </form>    
                </div>                
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection