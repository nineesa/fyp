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
              <h1><center>{{ $pendaftaran->program }}</center></h1>


            </div>
            <div class="col-md-4">
                <hr>
                <!-- <h1>{{ $pendaftaran->program }}</h1> -->
                <p> Penganjur  :   {{ $pendaftaran->penganjur }}</p>
                <p>Penerangan Program  :   {{ $pendaftaran->penerangan_program }}</p>
                <p> Tarikh  :   {{ $pendaftaran->tarikh }}</p>
                <p> Masa  :   {{ $pendaftaran->masa }}</p>
                <p>Lokasi  :   {{ $pendaftaran->lokasi }}</p>
                <p>Tempoh Latihan  :   {{ $pendaftaran->tempoh_latihan }}</p>
                <p>Kupulan Sasaran  :   {{ $pendaftaran->kump_sasaran }}</p>
                <p>Kos  :   {{ $pendaftaran->kos }}</p>
                <p>Maximum Peserta  :   {{ $pendaftaran->max_peserta }}</p>

                <br>

                    <button type="submit" class="btn btn-primary">Tempah</button>


            </div>
        </div>
    </div>
    </div>
@endsection
