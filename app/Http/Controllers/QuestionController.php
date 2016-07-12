<?php

namespace App\Http\Controllers;

use Flash;
use App\Question;
use App\Http\Requests;
use App\Jobs\SendAnswer;
use App\Jobs\SendQuestion;
use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    /**
    * Show all questions.
    */
    public function index()
    {
        // Get all questions.
    	$questions = Question::whereNull('answer')
                            ->orderby('id', 'desc')
                            ->simplePaginate();

        // add count of answers                            
        foreach ($questions as $question) {
            $count = Question::where('answer', $question->id)->count();
            if ($count) {
                $question->reply = $count;
            }
        }

        return view('questions.index', compact('questions'));
    }

    /**
    * Store question.
    *
    * @param QuestionRequest $request
    * @return redirect
    */
    public function store(QuestionRequest $request)
    {
        $job = new SendQuestion($request->all());

        $this->dispatch($job);

        Flash::success('Your question has been published.');

        return redirect()->route('questions.index');
    }

    /**
     * Add reply to a question.
     * @param  integer $reply
     * @return View
     */
    public function reply($id)
    {
        // Get question.
        $question = Question::where('id', $id)->firstOrFail();

        // Get answers.
        $answers  = Question::where('answer', $id)
                            ->orderBy('id', 'desc')
                            ->get();

        return view('questions.reply', compact('question', 'answers'));
    }

    /**
     * @param  AnswerRequest $request
     * @param  integer $id
     * @return redierct
     */
    public function replyStore(AnswerRequest $request, $id)
    {
        $job = new SendAnswer($request->all(), $id);

        $this->dispatch($job);

        Flash::success('Your answer has been published.');

        return redirect()->route('questions.reply', [$id]);
    }
}
