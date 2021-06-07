@extends('layouts.index')
@section('content')
<div class="container py-4">
    <div class="row">
    <div class="d-flex justify-content-center">
        <div class="card w-100">
            <div class="card">
                <div class="card-header">
                    Form Permintaan barang    
                </div>
                <div class="row ml-auto">
                    <a href="{{route('permintaanbrg.index')}}" class="btn btn-success">Show Data</a>
                </div>
                <div class="card-body">
                <form action="{{route('permintaanbrg.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Barang</label>
                    <input type="text" id="jumlah" name="jumlah" class="form-control">
                </div>
                <button class="btn btn-primary" type="submit">Process</button>
                </form>    
                </div>    
            </div>    
        </div>    
    </div>    
    </div>    
</div>
@endsection