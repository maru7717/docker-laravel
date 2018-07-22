@extends('layouts.app_admin')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">動画取得</div>
        <div class="panel-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            </ul>
          </div>
          @endif
          {!! Form::open(['url' => 'admin/movies/store', 'class' => 'form-horizontal']) !!}
          <div class="form-group{{ $errors->has('distributor') ? ' has-error' : '' }}">

            {!! Form::label('distributor', '配信者:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
            @foreach($distributors as $key => $value)
              <label class="checkbox-inline">
                {!! Form::checkbox('distributor[]', $value->id) !!}
                {{ $value->chocoa_real_name }}
              </label>
            @endforeach
            @if ($errors->has('distributor'))
              <span class="help-block">
                <strong>{{ $errors->first('distributor') }}</strong>
              </span>
            @endif
            </div>

            {!! Form::label('published', '配信日:', ['class' => 'col-md-2 control-label']) !!}
            <div class="col-md-10">
            {!! Form::selectRange('from_year', 2016, $toDay->year, $fromDay->year) !!}年
            {!! Form::selectRange('from_month', 1, 12, $fromDay->month) !!}月
            {!! Form::selectRange('from_day', 1, 31, $fromDay->day) !!}日
            <span>〜</span>
            {!! Form::selectRange('to_year', 2016, $toDay->year, $toDay->year) !!}年
            {!! Form::selectRange('to_month', 1, 12, $toDay->month) !!}月
            {!! Form::selectRange('to_day', 1, 31, $toDay->day) !!}日
            </div>
          </div>

          {!! Form::submit('Youtubeから取得') !!}
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection