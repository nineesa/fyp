
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
<th width="30%">Program</th>
<th width="20%">Tarikh </th>
<th width="20%">Masa </th>
<th width="20%">Lokasi</th>
<th width="15%">Action</th>

</tr>
</thead>
<tbody pull-{right}>
<?php $i = 0 ?>
@forelse($tempahans as $tempahan)
<tr>
<td >{{ $tempahans->firstItem() + $i }}</td>
<td>{{  $tempahan->pendaftaran->program }}</td>
<td>{{  $tempahan->pendaftaran->tarikh_mula }} </td>
<td>{{  $tempahan->pendaftaran->masa_mula }}</td>
<td>{{  $tempahan->pendaftaran->lokasi }}</td>
<td>
@if( $tempahan->user_id == Auth::user()->id)
<a href="{{ action('TempahansController@show', $tempahan->id) }}"
class="btn btn-primary btn-sm">Details</a>
@endif
</td>

</tr>
<?php $i++ ?>
@empty
<tr>
<td colspan="6">Tiada program yang telah anda daftarkan .</td>
</tr>
@endforelse
</tbody>
</table>
{{ $tempahans->links() }}
</div>
</div>
</div>
</div>
</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection
