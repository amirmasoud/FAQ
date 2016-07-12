@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Questions</div>

                <div class="panel-body">
                    @include('questions.form')
                </div>
            </div>
        </div>
    </div>
    @foreach($questions as $question)
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><b><i class="fa fa-question"></i></b>  {{ $question->title }}</div>

                <div class="panel-body">
                    {{ $question->text }}
                </div>
                <div class="panel-footer"><a href="{{ route('questions.reply', [$question->id]) }}"><i class="fa fa-mail-reply"></i> Reply</a> <span class="badge">{{ $question->reply }}</span></div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- Pager -->
            <ul class="pager">
                @if ( $questions->hasMorePages() )
                <li class="next pull-right">
                    <a href="{{ $questions->nextPageUrl() }}">Older Questions <i class="fa fa-arrow-right"></i></a>
                </li>
                @endif

                @if ( $questions->currentPage() != 1 )
                <li class="next pull-left">
                    <a href="{{ $questions->previousPageUrl() }}"><i class="fa fa-arrow-left"></i> Newer Questions </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
