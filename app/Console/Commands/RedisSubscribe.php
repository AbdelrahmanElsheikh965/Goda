<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

class RedisSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis-subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Subscribe to Redis Channel';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Redis::subscribe(['channel'], function ($message){
            echo $message;
        });
    }
}
