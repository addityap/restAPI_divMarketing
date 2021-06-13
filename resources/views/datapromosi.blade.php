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
                      <th>Nama Promosi</th>
                      <th>Description</th>
                      <th>Date</th>
                      <th>Duration</th>
                      <th>Cost</th>
                      <th>Aproved</th>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                      @foreach ($resp as $api)
                          <tr>
                              <td>{{$no++}}</td>
                              {{-- <td>{{$api['id']}}</td> --}}
                              <td>{{$api['name']}}</td>
                              <td>{{$api['description']}}</td>
                              <td>{{$api['date']}}</td>
                              <td>{{$api['duration']}}</td>
                              <td>{{$api['cost']}}</td>
                              <td>{{$api['aproved']}}</td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection