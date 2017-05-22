@extends('layouts.app2')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading" style="background-color:powderblue;">
        <h2>Perincian Latihan</h2>
    </div>
    <div class="panel-body">
      <div class="row">
          <div class="col-md-2">


          </div>
        <div class="row">
            <div class="col-md-3">
              <h1><center>{{ $pendaftaran->program }}</center></h1>


            </div>
            <div class="col-md-4">
                <hr>
                <!-- <h1>{{ $pendaftaran->program }}</h1> -->
                <p> Penganjur  :   {{ $pendaftaran->penganjur }}</p>
                <p>Penerangan Program  :   {{ $pendaftaran->penerangan_program }} </p>
                <p> Tarikh & Masa Mula : {{ date("g:ia\, jS M Y", strtotime($pendaftaran->masa_mula)) }}</p>
                <p> Tarikh & Masa Akhir : {{date("g:ia\, jS M Y", strtotime($pendaftaran->masa_akhir)) }}</p>
                <p>Lokasi  :   {{ $pendaftaran->lokasi }}</p>
                <p>Kupulan Sasaran  :   {{ $pendaftaran->kump_sasaran }}</p>
                <p>Kos  :   {{ $pendaftaran->kos }}</p>
                <p>Maximum Peserta  :   {{ $pendaftaran->max_peserta }}</p>

                <br>
                <form action="{{ action('TempahansController@store') }}" method="POST">
                  {{ csrf_field() }}
                  <a href="{{ action('PendaftaransController@catalog') }}" class="btn btn-default">Cancel</a>
                    <button type="submit" class="btn btn-primary">Tempah</button>
                    <input type="hidden" name="pendaftaran_id" value="{{ $pendaftaran->id }}">

</form>
            </div>
        </div>
    </div>
    </div>
@endsection
