@extends('layouts.app')
@section('content')
<div class="panel panel-default">
<div class="panel-heading">
<h2>Pengesahan Permohonan Latihan</h2>
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-10">
<form class="form-horizontal" action="{{ action('PendaftaransController@simpan', $pendaftaran->id) }}"
method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

<div class="form-group form-group-lg has-success has-feedback">
  <label class="col-md-5 control-label" >Maklumat Penganjur</label>
  </div>

  <div class="form-group">
            <label class="col-md-4 control-label">Pemohon</label>
          <div class="col-md-8">
              <td>{{ Auth::user()->name }}</td>
          </div>
      </div>

      <div class="form-group">
                <label class="col-md-4 control-label">Telefon</label>
              <div class="col-md-8">
                  <td>{{ Auth::user()->phone }}</td>
              </div>
          </div>

          <div class="form-group">
                    <label class="col-md-4 control-label">Emel</label>
                  <div class="col-md-8">
                      <td>{{ Auth::user()->email }}</td>
                  </div>
              </div>

<div class="form-group{{ $errors->has('penganjur') ? ' has-error' : '' }}">
        <label for="penganjur" class="col-md-4 control-label">Penganjur</label>

        <div class="col-md-8">
            <input id="penganjur" type="text" class="form-control" name="penganjur" value="{{ $pendaftaran->penganjur }}" readonly>

            @if ($errors->has('penganjur'))
                <span class="help-block">
                    <strong>{{ $errors->first('penganjur') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group form-group-lg has-success has-feedback">
      <label class="col-md-5 control-label" >Maklumat Program</label>
      </div>

<div class="form-group{{ $errors->has('program') ? ' has-error' : '' }}">
        <label for="program" class="col-md-4 control-label">Program</label>

        <div class="col-md-8">
            <input id="program" type="text" class="form-control" name="program" value="{{ $pendaftaran->program }}" readonly>

            @if ($errors->has('program'))
                <span class="help-block">
                    <strong>{{ $errors->first('program') }}</strong>
                </span>
            @endif
        </div>
    </div>

<div class="form-group{{ $errors->has('penerangan_program') ? ' has-error' : '' }}">
    <label for="penerangan_program" class="col-md-4 control-label">Penerangan Program</label>
    <div class="col-md-8">
                                <textarea class="form-control" name="penerangan_program" rows="6" maxlength="500" readonly>{{ $pendaftaran->penerangan_program }}</textarea>
                                <p class="text-muted">Maxmimum character is 500</p>
                                @if($errors->has('penerangan_program'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penerangan_program') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                        @if($errors->has('time')) has-error @endif
                        <label  for="time" class="col-md-4 control-label">Masa</label>
                        <div class="input-group" class="col-md-8">

                        <input type="text" class="form-control" name="time" placeholder="Select your time" value="{{$pendaftaran->masa_mula. ' - ' . $pendaftaran->masa_akhir }}" readonly >
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                        @if ($errors->has('time'))
                        <p class="help-block"><span class="glyphicon glyphicon-exclamation-sign"></span>
                        {{ $errors->first('time') }}
                        </p>
                        @endif
                        </div>


<div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
<label for="lokasi" class="col-md-4 control-label">Lokasi</label>

<div class="col-md-8">
    <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{ $pendaftaran->lokasi }}" readonly>

    @if ($errors->has('lokasi'))
        <span class="help-block">
            <strong>{{ $errors->first('lokasi') }}</strong>
        </span>
    @endif
</div>
</div>


<div class="form-group{{ $errors->has('kump_sasaran') ? ' has-error' : '' }}">
<label for="kump_sasaran" class="col-md-4 control-label">Kumpulan Sasaran</label>

<div class="col-md-8">
<input id="kump_sasaran" type="text" class="form-control" name="kump_sasaran" value="{{ $pendaftaran->kump_sasaran }}" readonly>

@if ($errors->has('kump_sasaran'))
<span class="help-block">
    <strong>{{ $errors->first('kump_sasaran') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('kos') ? ' has-error' : '' }}">
<label for="kos" class="col-md-4 control-label">Yuran</label>

<div class="col-md-8">
<input id="kos" type="text" class="form-control" name="kos" value="{{ $pendaftaran->kos }}" readonly>

@if ($errors->has('kos'))
<span class="help-block">
<strong>{{ $errors->first('kos') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('max_peserta') ? ' has-error' : '' }}">
<label for="max_peserta" class="col-md-4 control-label">Maximum Peserta</label>

<div class="col-md-8">
<input id="max_peserta" type="text" class="form-control" name="max_peserta" value="{{ $pendaftaran->max_peserta }}" readonly>

@if ($errors->has('max_peserta'))
<span class="help-block">
<strong>{{ $errors->first('max_peserta') }}</strong>
</span>
@endif
</div>
</div>

<!-- <input name="status" id="status" class="btn btn-info pull-right" role="button" value="Lulus"> -->
<!-- <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label for="status" class="col-md-4 control-label"></label>

        <div class="col-md-8"> -->
            <!-- <input id="status" type="text" class="form-control" name="program" value="{{ old('program') }}" required autofocus> -->
            <!-- <input id="status" type="button" class="btn btn-success" name="status" value="Lulus">
            <input id="status" type="button" class="btn btn-success" name="status" value="Tidak Lulus">
            <button type="submit" class="btn btn-success">Lulus</button>
            <button type="submit" class="btn btn-success">Tidak Lulus</button>
            <a href="{{ action('PendaftaransController@index') }}" class="btn btn-default">Cancel</a> -->
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button name="status" id="status" type="submit" class="btn btn-success" value="Lulus">Lulus</button>
            <button name="status" id="status" type="submit" class="btn btn-danger" value="Tidak Lulus">Tidak Lulus</button>

            <!-- @if ($errors->has('status'))
                <span class="help-block">
                    <strong>{{ $errors->first('status') }}</strong>
                </span>
            @endif
        </div>
    </div> -->

</form>
</div>
</div>
</div>
</div>
@endsection
