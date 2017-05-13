
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
<th width="50%">Nama </th>
<th width="40%">Program</th>



</tr>
</thead>
<tbody pull-{right}>
<?php $i = 0 ?>
@forelse($tempahans as $tempahan)
<tr>
<td >{{ $tempahans->firstItem() + $i }}</td>
<td>{{  $tempahan->user->name }} </td>
<td>{{  $tempahan->pendaftaran->program }}</td>


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
