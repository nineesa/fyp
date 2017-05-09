@extends('layouts.app')
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
<th width="70%">Nama</th>
<th width="20%">Kehadiran</th>
<

</tr>
</thead>
<tbody>
    @foreach ($tempahans as $tempahan)
    <tr>
<td > {{ $loop->iteration}}</td>
<td>{{  $tempahan->name }}</td>
<td>{{$tempahan->kehadiran}}</td>


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
