
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
<th width="15%">Tarikh </th>
<th width="15%">Masa </th>
<th width="15%">Lokasi</th>
<th width="15%">Action</th>
<th width="30%">Kehadiran</th>

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

<a href="{{ action('TempahansController@show', $tempahan->id) }}" class="btn btn-primary btn-sm">Details</a>

</td>
<td>
  <form action="{{ action('TempahansController@simpan', $tempahan->id) }}" method="PATCH">
    {{ csrf_field() }}
  @if ($tempahan->kehadiran == 'Belum Disahkan')
  <button name="status" id="status" type="submit" class="btn btn-success" value="Lulus">Hadir</button>
    </td>

    <td>
  <button name="status" id="status" type="submit" class="btn btn-danger" value="Tidak Lulus">Tidak Hadir</button>
  </td>

  @endif


</form>
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
