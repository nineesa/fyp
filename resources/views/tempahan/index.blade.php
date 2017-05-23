
@extends('layouts.app2')
@section('content')

<div class="panel panel-default">
<div class="panel-heading" style="background-color:powderblue;">
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
<th width="25%">Program</th>
<th width="18%">Mula </th>
<th width="18%">Akhir </th>
<th width="10%">Lokasi</th>
<th width="12%">Action</th>
<th width="40%">Kehadiran</th>

</tr>
</thead>
<tbody pull-{right}>
<?php $i = 0 ?>
@forelse($tempahans as $tempahan)
<tr>
<td >{{ $tempahans->firstItem() + $i }}</td>
<td>{{  $tempahan->pendaftaran->program }}</td>
<td> {{ date("g:ia\, jS M Y", strtotime($tempahan->pendaftaran->masa_mula)) }}</td>
<td>  {{date("g:ia\, jS M Y", strtotime($tempahan->pendaftaran->masa_akhir)) }}</td>
<td>{{  $tempahan->pendaftaran->lokasi }}</td>
<td>

<a href="{{ action('TempahansController@show', $tempahan->id) }}" class="btn btn-primary btn-sm">Details</a>

</td>
<td>
  <form action="{{ action('TempahansController@simpan', $tempahan->id) }}" method="POST">
    {{ csrf_field() }}
  @if ($tempahan->kehadiran == 'Belum Disahkan')
  <button name="kehadiran" id="kehadiran" type="submit" class="btn btn-success btn-sm" value="Hadir">Hadir</button>
  <button name="kehadiran" id="kehadiran" type="submit" class="btn btn-danger btn-sm" value="Tidak Hadir">Tidak Hadir</button>
    <input type="hidden" name="tempahan_id" value="{{ $tempahan->id }}">
  </td>
  @endif
@if ($tempahan->kehadiran == 'Hadir')
{{$tempahan->kehadiran }}
  @endif
  @if ($tempahan->kehadiran == 'Tidak Hadir')
  {{$tempahan->kehadiran }}
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
