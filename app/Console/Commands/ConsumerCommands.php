<?php

namespace App\Console\Commands;

use App\Messaging\RmqAmazonSearchesConsumer;
use Illuminate\Console\Command;

class ConsumerCommands extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'consume:searches';

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
     * @return mixed
     */
    public function handle()
    {
        $consumer = new RmqAmazonSearchesConsumer();
        $consumer->consume();
    }
}
