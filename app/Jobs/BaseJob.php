<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class BaseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $jobId;

    public function __construct()
    {
        log::info('__construct');
        // $this->jobId = $jobId;
    }


    protected function start() {
        // your start logic
        log::info('start');
    }

    protected function stop() {
        // your stop logic
        log::info('stop');
    }

    protected function process() {
        // will be overrittten
        log::info('process');
    }

    public function handle() {
        log::info('handle');
        $this->start();
        $this->process();
        $this->stop();
    }
}
