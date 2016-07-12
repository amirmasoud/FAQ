<?php

namespace App\Jobs;

use Auth;
use App\Jobs\Job;
use App\Question;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAnswer extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Answeer request.
     * 
     * @var Request
     */
    protected $request;

    /**
     * Reply id.
     */
    protected $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request, $id)
    {
        $this->request = $request;
        $this->id      = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user_id = Auth::user()->id;
        $this->request['user_id'] = $user_id;
        $this->request['answer'] = $this->id;
        $question = new Question($this->request);
        $question->save();
    }
}
