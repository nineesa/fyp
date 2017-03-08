@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Jadual Latihan</h2>
    </div>
    <div class="panel-body">
      <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
              <div class="col-md-9">
                  @foreach($pendaftarans as $pendaftaran)
                      <div class="col-md-4" id="catalog">
                          <h4><strong>{{ $pendaftaran->program }}</strong></h4>

                          <br>
                          <p> Penganjur  :  {{ $pendaftaran->penganjur }}</p>
                          <p> Tarikh  :  {{ $pendaftaran->tarikh }}</p>

                          <a href="{{ url('catalog', $pendaftaran->id) }}" class="btn btn-primary">Perinci</a>
                          <br><br>
                      </div>
                  @endforeach
                </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection