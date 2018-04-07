<div class="form-group">
    {!! Form::label('day', 'セッション日:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-calendar"></i>
        </div>
        {!! Form::text('day', null, ['class' => 'form-control pull-right relative datepicker1']) !!}
      </div>
    </div>
</div>

<!--
<div class="form-group">
    {!! Form::label('start_hour', '開始時間:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10 form-inline">
        {!! Form::select('start_hour', $hourList, null, ['class' => 'form-control']) !!}<label class="control-label">時</label>
        {!! Form::select('start_minute', $timeList, null, ['class' => 'form-control']) !!}<label class="control-label">分</label>
    </div>
</div>
 -->

<div class="well well-sm">
  <div class="form-group">
      {!! Form::label('load_id1', 'プレイヤー１:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4 form-inline">
          {!! Form::select('lord_id1', $lords, null, ['class' => 'form-control']) !!}
          {!! Form::select('player_id1', $players, null, ['class' => 'form-control']) !!}
      </div>
      {!! Form::label('load_id2', 'プレイヤー２:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4 form-inline">
          {!! Form::select('lord_id2', $lords, null, ['class' => 'form-control']) !!}
          {!! Form::select('player_id2', $players, null, ['class' => 'form-control']) !!}
      </div>
  </div>

  <div class="form-group">
      {!! Form::label('load_id3', 'プレイヤー３:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4 form-inline">
          {!! Form::select('lord_id3', $lords, null, ['class' => 'form-control']) !!}
          {!! Form::select('player_id3', $players, null, ['class' => 'form-control']) !!}
      </div>
      {!! Form::label('load_id4', 'プレイヤー４:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4 form-inline">
          {!! Form::select('lord_id4', $lords, null, ['class' => 'form-control']) !!}
          {!! Form::select('player_id4', $players, null, ['class' => 'form-control']) !!}
      </div>
  </div>
</div>

<div class="well well-sm">
  <div class="form-group">
      {!! Form::label('load_id5', 'プレイヤー５:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4 form-inline">
          {!! Form::select('lord_id5', $lords, null, ['class' => 'form-control']) !!}
          {!! Form::select('player_id5', $players, null, ['class' => 'form-control']) !!}
      </div>
      {!! Form::label('load_id6', 'プレイヤー６:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4 form-inline">
          {!! Form::select('lord_id6', $lords, null, ['class' => 'form-control']) !!}
          {!! Form::select('player_id6', $players, null, ['class' => 'form-control']) !!}
      </div>
  </div>

  <div class="form-group">
      {!! Form::label('load_id7', 'プレイヤー７:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4 form-inline">
          {!! Form::select('lord_id7', $lords, null, ['class' => 'form-control']) !!}
          {!! Form::select('player_id7', $players, null, ['class' => 'form-control']) !!}
      </div>
      {!! Form::label('load_id8', 'プレイヤー８:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-4 form-inline">
          {!! Form::select('lord_id8', $lords, null, ['class' => 'form-control']) !!}
          {!! Form::select('player_id8', $players, null, ['class' => 'form-control']) !!}
      </div>
  </div>
</div>

<div class="form-group">
    {!! Form::label('end_year', '終了年:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('end_year', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('result', '結果:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('result', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('report', '記録:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('report', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
        {!! link_to('sessions', '一覧へ戻る', ['class' => 'btn btn-default']) !!}
    </div>
</div>