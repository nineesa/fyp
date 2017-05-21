@extends('layouts.app2')
@section('content')

<div class="panel panel-default">
<div class="panel-heading">
<h2>Tempahan</h2>
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>#</th>
<th width="70%">Program</th>
<th width="20%">Bilangan Memohon</th>
<th width="15%">Action</th>

</tr>
</thead>
<tbody>
    @foreach ($tempahans as $tempahan)
    <tr>
<td > {{ $loop->iteration}}</td>
<td>{{  $tempahan->program }}</td>
<td>{{$tempahan->total}}</td>
<td>
<a href="{{ route('tempahan.peserta', $tempahan->program)}}" class="btn btn-primary btn-sm">Senarai Peserta</a>

</td>
<td>
<a href="{{ action('TempahansController@cetakpeserta', $tempahan->program)}}" class="btn btn-success btn-sm" >Cetak Senarai Peserta</a>
</td>
    @endforeach

  </tbody>
  </table>

  </div>
  </div>
  </div>
  </div>
  </div>
  <script src="{{ asset('js/warning.js') }}"></script>
  @endsection
