@extends('layouts.admin')

@section('content')
            <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Paket</h1>
                <a href="{{route('travel-package.create')}}" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Paket Travel
                </a>
            </div>

            <div class="row">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-bordered text-center    " width="100%" collspacing="0">
                            <thead class="py-3">
                                <tr>
                                    <th class="py-3">ID</th>
                                    <th>Title</th>
                                    <th>Country</th>
                                    <th>Type</th>
                                    <th>Depature Date</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <th>{{$item->id}}</th>
                                        <th>{{$item->title}}</th>
                                        <th>{{$item->country}}</th>
                                        <th>{{$item->type}}</th>
                                        <th>{{$item->depature_date}}</th>
                                        <th>{{$item->type}}</th>
                                        <th>
                                        <a href="{{route('travel-package.edit', $item->id)}}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form action="{{route('travel-package.destroy', $item->id)}}" class="d-inline" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                        </th>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-danger">Data Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            


        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection