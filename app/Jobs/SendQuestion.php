<?php

namespace App\Jobs;

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
        Question::create($this->request);
    }
}
