@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Perincian Latihan</h2>
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
                <p> Tarikh Mula  :   {{ $tempahan->pendaftaran->tarikh_mula }}</p>
                <p> Tarikh Akhir  :   {{ $tempahan->pendaftaran->tarikh_akhir }}</p>
                <p> Masa Mula  :   {{ $tempahan->pendaftaran->masa_mula }}</p>
                <p> Masa Akhir  :   {{ $tempahan->pendaftaran->masa_akhir }}</p>
                <p>Lokasi  :   {{$tempahan->pendaftaran->lokasi }}</p>
                <p>Kupulan Sasaran  :   {{ $tempahan->pendaftaran->kump_sasaran }}</p>
                <p>Kos  :   {{ $tempahan->pendaftaran->kos }}</p>
                <p>Maximum Peserta  :   {{ $tempahan->pendaftaran->max_peserta }}</p>

                <br>
                <!-- <form action="{{ action('TempahansController@store') }}" method="POST">
                  {{ csrf_field() }}
                  <a href="{{ action('PendaftaransController@catalog') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary">Tempah</button>
                    <input type="hidden" name="pendaftaran_id" value="{{ $pendaftaran->id }}">

</form> -->
            </div>
        </div>
    </div>
    </div>
@endsection
