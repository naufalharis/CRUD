@extends('products.layout')

@section('content')
<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <!-- Navbar content -->
  </nav>
<div style=" background-color:cadetblue; border:2px solid black;">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center btn-warning text-white py-3 mb-4">
                <h1 style="color:black; padding:20px;" class="font-weight-bold">Daftar pinjam</h1>
            </div>

            <div class="pull-right mb-4">
                <a class="btn btn-warning btn-lg" style="margin: 0px 12px 12px 0px ; color:black;" href="{{ route('products.create') }}">
                    <i class="fas fa-plus-circle"></i> Tambah Pinjaman Baru
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover shadow">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Detail</th>
                <th width="280px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="{{ $loop->even ? 'table-info' : 'table-secondary' }}">
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="btn-group">
                            <a class="btn btn-warning" href="{{ route('products.edit', $product->id) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $products->links() !!}
    </div>
</div>
@endsection
