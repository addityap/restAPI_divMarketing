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
                      <th>Nama Pembeli</th>
                      <th>Pesanan</th>
                      <th>Jumlah</th>
                      <th>Total Harga</th>
                      <th>Feedback</th>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                      @foreach ($resp as $api)
                          <tr>
                              <td>{{$no++}}</td>
                              {{-- <td>{{$api['id']}}</td> --}}
                              <td>{{$api['nama']}}</td>
                              <td>{{$api['pesanan']}}</td>
                              <td>{{$api['jumlah']}}</td>
                              <td>{{$api['totalharga']}}</td>
                              <td>{{$api['feedback']}}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection