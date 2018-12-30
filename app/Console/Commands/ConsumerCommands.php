<?php

namespace App\Console\Commands;

//use App\Messaging\RmqAmazonSearchesConsumer;
use Illuminate\Console\Command;

class ConsumerCommands extends Command
{
    private $amazonSearchesConsumer;
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
     * @param RmqAmazonSearchesConsumer $amazonSearchesConsumer
     */
    public function __construct(/*RmqAmazonSearchesConsumer $amazonSearchesConsumer*/)
    {
        parent::__construct();

//        $this->amazonSearchesConsumer = $amazonSearchesConsumer;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->amazonSearchesConsumer->consume();
    }
}
