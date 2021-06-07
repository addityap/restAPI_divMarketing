@extends('layouts.index')
@section('content')
<div class="container py-4">
    <div class="row">
        <div class="d-flex justify-content-center">
            <div class="card w-100 shadow">
                <div class="card-body">
                    <div class="card-title text-center">Show Data Dari Yang Terbaru</div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-hover">
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Date</th>
                            <tbody>
                                @php
                                    $no = 1
                                @endphp
                                @foreach ($permintaan as $data)
                                    <td>{{$no++}}</td>
                                    <td>{{$data->namabarang}}</td>
                                    <td>{{$data->jumlah}}</td>
                                    <td>{{$data->status}}</td>
                                    <td>{{$data->created_at->format('D-m-y')}}</td>
                                </tbody>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection