@extends('layouts.index')
@section('content')
<div class="container py-4">
    <div class="row">
    <div class="d-flex justify-content-center">
        <div class="card w-100 shadow">
            <div class="card">
                <div class="card-header">
                    Form Pesanan    
                </div>
                <div class="card-body">
                    <div class="text-end mt-3 mr-3">
                        <a href="{{route('listpesanan')}}" class="btn btn-success">Back</a>
                    </div>
                <form action="{{route('storepesanan')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pesanan">Pesanan Barang</label>
                    <input type="text" id="pesanan" name="pesanan" class="form-control">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Barang</label>
                    <input type="number" id="jumlah" name="jumlah" class="form-control">
                </div>
                <div class="form-group">
                    <label for="totalharga">Harga Barang</label>
                    <input type="number" id="totalharga" name="totalharga" class="form-control">
                </div>
                <div class="form-group">
                    <label for="feedback">Feedback Barang</label>
                    <input type="text" id="feedback" name="feedback" class="form-control">
                </div>
                <div class="row">
                    <div class="text-end mt-2">
                        <button class="btn btn-primary" type="submit">Process Data</button>
                    </div>
                </div>
                </form>    
                </div>    
            </div>    
        </div>    
    </div>    
    </div>    
</div>
@endsection