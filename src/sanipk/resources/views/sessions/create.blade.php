@extends('layouts.default')

@section('style')
@endsection

@section('script')
<script>
  $('.datepicker1').datepicker({
    format: "yyyy-mm-dd",
    language: "ja",
    autoclose: true, //日付選択で自動的にカレンダーを閉じる
    orientation:'bottom left'
  });
</script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">セッション 新規登録</div>
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

                    {!! Form::open(['url' => 'sessions',
                                'class' => 'form-horizontal',
                                'id' => 'session-input']) !!}

                    @include('sessions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection