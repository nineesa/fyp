@extends('layouts.app2')
@section('content')

<div class="panel panel-default">
<div class="panel-heading" style="background-color:powderblue;">
<h2>Senarai Peserta</h2>

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


</tr>
</thead>
<tbody>
    @foreach ($tempahans as $tempahan)

    <tr>
<td > {{ $loop->iteration}}</td>
<td>{{  $tempahan->user->name }}</td>
<td>{{$tempahan->kehadiran}}</td>
<td>

  <form class="" action="">
            <!-- <button type="submit" name="button">Send</button> -->
            <a href="{{ action('TempahansController@notification', $tempahan->id) }}" class="btn btn-success btn-sm" role="button">Hantar Email</a>
        </form>
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
