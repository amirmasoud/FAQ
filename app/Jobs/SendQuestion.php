<?php

namespace App\Jobs;

use Auth;
use App\Jobs\Job;
use App\Question;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendQuestion extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Contact form request
     * 
     * @var Request
     */
    protected $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
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
        $question = new Question($this->request);
        $question->save();
    }
}
