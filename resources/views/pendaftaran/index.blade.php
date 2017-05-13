
@extends('layouts.app')
@section('content')

<div class="panel panel-default">
<div class="panel-heading">
<h2>Permohonan Latihan<a href="{{ url('/pendaftaran/create') }}" class="btn btn-success pull-right" role="button">Borang Permohonan Latihan</a></h2>
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table table-striped">
<thead>
<tr>
<th>#</th>
<th width="60%">Program</th>
<th width="20%">Status Permohonan</th>
<th width="15%">Action</th>

</tr>
</thead>
<tbody pull-{right}>
<?php $i = 0 ?>
@forelse($pendaftarans as $pendaftaran)
<tr>
<td >{{ $pendaftarans->firstItem() + $i }}</td>
<td>{{ $pendaftaran->program }}</td>
<td>{{ $pendaftaran->status }}</td>
<td>
@if( $pendaftaran->user_id == Auth::user()->id)
<a href="{{ action('PendaftaransController@edit', $pendaftaran->id) }}"
class="btn btn-primary btn-sm">Edit</a>
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
{{ $pendaftarans->links() }}
</div>
</div>
</div>
</div>
</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection
