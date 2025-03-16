<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Profile;

class ProcessPodcast implements ShouldQueue
{
    use Queueable;

    protected $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $log = public_path();
        file_put_contents($log."/test0.log",print_r($this->data,true).PHP_EOL);
        (new Profile())->dispatchs($this->data);
        //file_put_contents("test1.log",print_r($user,true));
        sleep(10);
    }
}
