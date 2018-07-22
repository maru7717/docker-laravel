@extends('layouts.default')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span>セッション一覧</span>
          <span>{!! link_to('sessions/create', '新規作成', ['class' => 'btn btn-primary']) !!}</span>
        </div>
        <div class="panel-body">
        @if (Session::has('flash_message'))
          <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif
          <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
              <th>日付</th>
              <th>プレイヤー</th>
              <th>終了年</th>
              <th>動画</th>
            </tr>
            </thead>
          @foreach($sessions as $session)
            <tr>
              <td>{{ $session->day }}<br>{{ $session->start_time }}</td>
              <td>{{ $session->team1() }}<br>vs<br>{{ $session->team2() }}</td>
              <td>{{ $session->end_year }}<br>{{ $session->result }}</td>
              <td>
              @foreach($session->movies as $movie)
                {{ Html::link('https://www.youtube.com/watch?v='.$movie->video_id, '視聴する', ['target'=>'_blank']) }}
                (配信者：{{ $movie->player->chocoa_real_name }})<br>
              @endforeach
                {!! link_to_action('SessionController@show', '表示', [$session->id]) !!}
                {!! link_to_action('SessionController@edit', '編集', [$session->id]) !!}
                {!! Form::model($session,
                      ['url' => [
                        'sessions', $session->id],
                        'method' => 'delete',
                        'class' => 'delete-from'
                      ]) !!}
                      {!! Form::submit('削除', [
                        'onclick' => "return confirm('本当に削除しますか?')",
                        'class' => 'text-link'
                      ]) !!}
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
          </table>
          {!! $sessions->render() !!}
          user : {!! Auth::guard('user')->user() !!}<br>
          admin : {!! Auth::guard('admin')->user() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection