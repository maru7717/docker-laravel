@extends('layouts.default')

@section('style')
@endsection

@section('script')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">セッション 新規登録 完了</div>
                <div class="panel-body">
                  <div class="alert alert-primary" role="alert">
                    新規追加しました。
                    <a href="/sessions" class="btn btn-primary">一覧に戻る</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
