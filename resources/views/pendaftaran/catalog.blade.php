@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Jadual Latihan</h2>
    </div>
    <div class="panel-body">
      <div class="row">
              <div class="col-md-25">
                <div class="table-responsive">
              <div class="col-md-15">
                  @foreach($pendaftarans as $pendaftaran)
                      <div class="col-md-4" id="catalog">
                          <h4><strong>{{ $pendaftaran->program }}</strong></h4>

                          <br>
                          <p> Penganjur  :  {{ $pendaftaran->penganjur }}</p>
                          <p>  {{ date("g:ia\, jS M Y", strtotime($pendaftaran->masa_mula)) }}</p>
					                <p>  {{date("g:ia\, jS M Y", strtotime($pendaftaran->masa_akhir)) }}</p> 

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
