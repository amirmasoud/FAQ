@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b><i class="fa fa-question"></i></b>  {{ $question->title }}</div>

                <div class="panel-body">
                    {{ $question->text }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Reply</div>

                <div class="panel-body">
                    @include('questions.replyForm')
                </div>
            </div>
        </div>
    </div>

    @foreach ($answers as $answer)
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">{{ $answer->title }}</div>

                <div class="panel-body">
                    {{ $answer->text }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
</div>
@endsection
