@extends('layouts.index')
@section('content')
<div class="container py-3">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark">
                      <th>No</th>
                      {{-- <th>ID Logistic</th> --}}
                      <th>Tanggal Masuk</th>
                      <th>Tanggal Keluar</th>
                      <th>Alamat</th>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                      @foreach ($datas['data'] as $api)
                          <tr>
                              <td>{{$no++}}</td>
                              {{-- <td>{{$api['id']}}</td> --}}
                              <td>{{$api['tanggal_masuk']}}</td>
                              <td>{{$api['tanggal_keluar']}}</td>
                              <td>{{$api['alamat']}}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection