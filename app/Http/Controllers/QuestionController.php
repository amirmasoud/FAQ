<?php

namespace App\Http\Controllers;

use App\Question;
use App\Http\Requests;
use App\Jobs\SendQuestion;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function index()
    {
    	return Question::simplePaginate();
    }

    public function store(QuestionRequest $request)
    {
        $job = new SendQuestion($request->all());

        $this->dispatch($job);

        Flash::success('Your question has been published.');

        return redirect()->route('questions');
    }
}
