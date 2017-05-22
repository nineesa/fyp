@extends('layouts.app2')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading" style="background-color:powderblue;">
        <h2>Perincian Tempahan</h2>
    </div>
    <div class="panel-body">
      <div class="row">
          <div class="col-md-2">


          </div>
        <div class="row">
            <div class="col-md-3">
              <h1><center>{{ $tempahan->pendaftaran->program }}</center></h1>


            </div>
            <div class="col-md-4">
                <hr>

                <p> Penganjur  :   {{ $tempahan->pendaftaran->penganjur }}</p>
                <p>Penerangan Program  :   {{ $tempahan->pendaftaran->penerangan_program }}</p>
                <p> Tarikh & Masa Mula : {{ date("g:ia\, jS M Y", strtotime($tempahan->pendaftaran->masa_mula)) }}</p>
                <p> Tarikh & Masa Akhir : {{date("g:ia\, jS M Y", strtotime($tempahan->pendaftaran->masa_akhir)) }}</p>
                <p>Lokasi  :   {{$tempahan->pendaftaran->lokasi }}</p>
                <p>Kupulan Sasaran  :   {{ $tempahan->pendaftaran->kump_sasaran }}</p>
                <p>Kos  :   {{ $tempahan->pendaftaran->kos }}</p>
                <p>Maximum Peserta  :   {{ $tempahan->pendaftaran->max_peserta }}</p>

                <br>
                <a href="{{ action('TempahansController@index') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
    </div>
@endsection
