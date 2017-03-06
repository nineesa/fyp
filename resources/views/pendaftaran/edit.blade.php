@extends('layouts.app')
@section('content')
<div class="panel panel-default">
<div class="panel-heading">
<h2>Borang Pendaftaran Latihan</h2>
</div>
<div class="panel-body">
<div class="row">
<div class="col-md-10">
<form class="form-horizontal" action="{{ action('PendaftaransController@update', $pendaftaran->id) }}"
method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}

<div class="form-group{{ $errors->has('program') ? ' has-error' : '' }}">
        <label for="program" class="col-md-4 control-label">Program</label>

        <div class="col-md-8">
            <input id="program" type="text" class="form-control" name="program" value="{{ $pendaftaran->program }}" required autofocus>

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
                                <textarea class="form-control" name="penerangan_program" rows="6" maxlength="500">{{ $pendaftaran->penerangan_program }}</textarea>
                                <p class="text-muted">Maxmimum character is 500</p>
                                @if($errors->has('penerangan_program'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penerangan_program') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

        <div class="form-group{{ $errors->has('tarikh') ? ' has-error' : '' }}">
        <label for="tarikh" class="col-md-4 control-label">Tarikh</label>

        <div class="col-md-8">
            <input id="tarikh" type="date" class="form-control" name="tarikh" value="{{ $pendaftaran->tarikh }}" required autofocus>

            @if ($errors->has('tarikh'))
                <span class="help-block">
                    <strong>{{ $errors->first('tarikh') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('masa') ? ' has-error' : '' }}">
    <label for="masa" class="col-md-4 control-label">Masa</label>

    <div class="col-md-8">
        <input id="masa" type="time" class="form-control" name="masa" value="{{ $pendaftaran->masa }}" required autofocus>

        @if ($errors->has('masa'))
            <span class="help-block">
                <strong>{{ $errors->first('masa') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
<label for="lokasi" class="col-md-4 control-label">Lokasi</label>

<div class="col-md-8">
    <input id="lokasi" type="text" class="form-control" name="lokasi" value="{{ $pendaftaran->lokasi }}" required autofocus>

    @if ($errors->has('lokasi'))
        <span class="help-block">
            <strong>{{ $errors->first('lokasi') }}</strong>
        </span>
    @endif
</div>
</div>

<div class="form-group{{ $errors->has('tempoh_latihan') ? ' has-error' : '' }}">
<label for="tempoh_latihan" class="col-md-4 control-label">Tempoh Latihan</label>

<div class="col-md-8">
<input id="tempoh_latihan" type="text" class="form-control" name="tempoh_latihan" value="{{ $pendaftaran->tempoh_latihan }}" required autofocus>

@if ($errors->has('tempoh_latihan'))
    <span class="help-block">
        <strong>{{ $errors->first('tempoh_latihan') }}</strong>
    </span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('kump_sasaran') ? ' has-error' : '' }}">
<label for="kump_sasaran" class="col-md-4 control-label">Kumpulan Sasaran</label>

<div class="col-md-8">
<input id="kump_sasaran" type="text" class="form-control" name="kump_sasaran" value="{{ $pendaftaran->kump_sasaran }}" required autofocus>

@if ($errors->has('kump_sasaran'))
<span class="help-block">
    <strong>{{ $errors->first('kump_sasaran') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('kos') ? ' has-error' : '' }}">
<label for="kos" class="col-md-4 control-label">Kos</label>

<div class="col-md-8">
<input id="kos" type="text" class="form-control" name="kos" value="{{ $pendaftaran->kos }}" required autofocus>

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
<input id="max_peserta" type="text" class="form-control" name="max_peserta" value="{{ $pendaftaran->max_peserta }}" required autofocus>

@if ($errors->has('max_peserta'))
<span class="help-block">
<strong>{{ $errors->first('max_peserta') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
<a href="{{ action('PendaftaransController@index') }}" class="btn
btn-default">Cancel</a>
<button type="submit" class="btn btn-success">Save</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
