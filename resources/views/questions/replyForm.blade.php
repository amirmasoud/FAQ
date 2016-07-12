@include ('errors.form', ['errors' => $errors])
@include ('alert')
{!! Form::open(['action' => ['QuestionController@replyStore', $question->id], 'method' => 'post', 'class' => 'form-horizontal']) !!}
  <div class="form-group">
    {!! Form::label('title', 'Title', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
      {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Title']) !!}
    </div>
  </div>

  <div class="form-group">
    {!! Form::label('text', 'Text', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('text', null, ['class' => 'form-control', 'placeholder' => 'Text', 'id' => 'text', 'rows' => '3']) !!}
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
    </div>
  </div>
{!! Form::close() !!}