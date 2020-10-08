@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Gallery</h1>
                
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
                    <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <select name="travel_packages_id" class="form-control" required>
                                <option value="">Pilih paket Travel</option>
                                @foreach ($travel_packages as $travel_package)
                                    <option value="{{ $travel_package->id }}">{{ $travel_package->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">image</label>
                            <input type="file" name="image" class="form-control" placeholder="image">
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