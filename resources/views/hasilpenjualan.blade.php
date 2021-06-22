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
                      <th>Division ID</th>
                      <th>No Dokumen</th>
                      <th>Tanggal Masuk Dokumen</th>
                      <th>Status</th>
                      <th>Total Keuntungan</th>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                      @foreach ($resp["data"] as $api)
                          <tr>
                              <td>{{$no++}}</td>
                              {{-- <td>{{$api['id']}}</td> --}}
                              <td>{{$api['division_id']}}</td>
                              <td>{{$api['no_dokumen']}}</td>
                              <td>{{$api['tanggal_masuk_dokumen']}}</td>
                              <td>{{$api['status']}}</td>
                              <td>{{$api['total_keuntungan']}}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection