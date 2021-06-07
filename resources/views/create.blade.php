@extends('layouts.index')
@section('content')
<div class="container">
    <div class="row">
    <div class="d-flex justify-content-center">
        <div class="card w-100">
            <div class="card">
                <div class="card-title">
                    Form Permintaan barang    
                </div>
                <div class="card-body">
                <form action="" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control">
                </div>
                </form>    
                </div>    
            </div>    
        </div>    
    </div>    
    </div>    
</div>
@endsection