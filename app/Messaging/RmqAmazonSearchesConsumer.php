<?php
/**
 * Created by PhpStorm.
 * User: Life
 * Date: 24.11.2018
 * Time: 23:24
 */

namespace App\Messaging;

use App\Enums\ProgressType;
use App\Services\AmazonSearchService;
use ErrorException;
use Illuminate\Support\Facades\DB;
use PhpAmqpLib\Connection\AMQPStreamConnection;

define ('SOCKET_EAGAIN', 11);

class RmqAmazonSearchesConsumer
{
    private $connection;
    private $channel;
    private $exchange;
    private $queue;

    public function __construct(){
        $this->exchange = config("amqp.properties.production.exchange");
        $this->queue = config("amqp.properties.production.queue");
        $host = config("amqp.properties.production.host");
        $port = config("amqp.properties.production.port");
        $user = config("amqp.properties.production.username");
        $password = config("amqp.properties.production.password");
        $vhost = config("amqp.properties.production.vhost");

        $this->connection = new AMQPStreamConnection($host, $port, $user, $password, $vhost);
        $this->channel = $this->connection->channel();

        $this->channel->queue_declare($this->queue, false, true, false, false);
        $this->channel->exchange_declare($this->exchange, 'direct', false, true, false);
        $this->channel->queue_bind($this->queue, $this->exchange);
    }

    public function consume(){
        $this->channel->basic_consume($this->queue, '', false, true, false, false, [$this, 'callback'] );

        register_shutdown_function([$this, 'closeConnection'], $this->channel, $this->connection);

        while (count($this->channel->callbacks)) {
            try {
                $this->channel->wait();
            } catch (ErrorException $e) {
                echo $e->getMessage();
            }
        }
    }

    public function callback($message){
        $searchHash = $message->body;

        $existedSearch = DB::table("searches")
            ->where('originalname', $searchHash)
            ->first();

        if($existedSearch != null &&
            $existedSearch->progresstype == ProgressType::IN_PROCESS)
            return;

        $amazonSearchService = new AmazonSearchService($searchHash);
        $amazonSearchService->startSearch();
    }

    public function closeConnection()
    {
        $this->channel->close();
        $this->connection->close();
    }
}