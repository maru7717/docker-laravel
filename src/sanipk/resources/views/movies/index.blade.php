@extends('layouts.app_admin')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span style="line-height:2.6;">動画一覧</span>
          <span>{!! link_to('admin/movies/get', '取得', ['class' => 'btn btn-primary pull-right']) !!}</span>
        </div>
        <div class="panel-body">
        @if (Session::has('flash_message'))
          <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif
          <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
              <th>配信日</th>
              <th>動画の長さ</th>
              <th>配信者</th>
            </tr>
            </thead>
          @foreach($movies as $movie)
            <tr>
              <td>{{ $movie->published_at_tokyo }}</td>
              <td>{{ str_replace(['PT', 'H', 'M', 'S'], ['', '時間', '分', '秒'], $movie->duration) }}</td>
              <td>{{ $movie->player_id }}</td>
            </tr>
          @endforeach
          </table>
          {!! $movies->render() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection