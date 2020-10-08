@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit Transasksi ( {{$item->title}} )</h1>
                
            </div>

            {{-- Error Message --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="card-shadow">
                <div class="card-body">
                    <form action="{{ route('transaction.update', $item->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="transaction_status">Ubah Status</label>
                            <select name="transaction_status" class="form-control" required>
                                <option disabled value="transaction_status">Status saat ini ( {{$item->transaction_status}} )</option>
                                <option value="IN_CART">In Cart</option>
                                <option value="PENDING">Pending</option>
                                <option value="SUCCESS">Success</option>
                                <option value="CANCEL">Cancel</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Ubah</button>
                    </form>    
                </div>                
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection