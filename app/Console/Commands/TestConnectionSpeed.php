<?php

namespace App\Console\Commands;

use App\Models\Speedtest;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use JJG\Ping;
use stdClass;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\Stopwatch\Stopwatch;

class TestConnectionSpeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedy:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Called');
        
        $process = new Process(['speedtest', '--json']);
        $time = stopwatch(function() use($process){
            $process->run();
        });


        if (!$process->isSuccessful()) {
            $result = "{}";
            $data = new stdClass;
            $data->download = 0;
            $data->upload = 0;
            $data->timestamp = now();
            $data->ping = null;
        } else {
            $result = $process->getOutput();
            $data = json_decode($result);
        }
        $speedtest = new Speedtest();
        $speedtest->download = $data->download;
        $speedtest->upload = $data->upload;
        $speedtest->ping = $data->ping == null ? null : $data->ping / 1000;
        $speedtest->result = $result;
        $speedtest->duration = $time;
        $speedtest->tested_at = Carbon::parse($data->timestamp)->setTimezone(config('app.timezone'));
        $speedtest->save();
        $this->info("Finished in ${time} seconds");
    }
}
