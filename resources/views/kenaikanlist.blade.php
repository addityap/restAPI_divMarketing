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
                      <th>Nama Karyawan</th>
                      <th>Posisi Sekarang</th>
                      <th>Promosi Ke </th>
                      <th>Awal Kerja</th>
                      <th>Kinerja</th>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                      @foreach ($resp["data"] as $api)
                          <tr>
                              <td>{{$no++}}</td>
                              {{-- <td>{{$api['id']}}</td> --}}
                              <td>{{$api['nama_karyawan']}}</td>
                              <td>{{$api['now_posisi']}}</td>
                              <td>{{$api['promoteTo']}}</td>
                              <td>{{$api['awalkerja']}}</td>
                              <td>{{$api['kinerja']}}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection