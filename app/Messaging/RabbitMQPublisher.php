<?php
/**
 * Created by PhpStorm.
 * User: Life
 * Date: 24.11.2018
 * Time: 23:24
 */

namespace App\Messaging;


use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

define ('SOCKET_EAGAIN', 11);

class RabbitMQPublisher
{
    private $connection;
    private $channel;
    private $exchange;

    public function __construct(){
        $this->exchange = config("amqp.properties.production.exchange");
        $queue = config("amqp.properties.production.queue");
        $host = config("amqp.properties.production.host");
        $port = config("amqp.properties.production.port");
        $user = config("amqp.properties.production.username");
        $password = config("amqp.properties.production.password");
        $vhost = config("amqp.properties.production.vhost");

        $this->connection = new AMQPStreamConnection($host, $port, $user, $password, $vhost);
        $this->channel = $this->connection->channel();

        $this->channel->queue_declare($queue, false, true, false, false);
        $this->channel->exchange_declare($this->exchange, 'direct', false, true, false);
        $this->channel->queue_bind($queue, $this->exchange);
    }

    public function publish($message)
    {
        $message = new AMQPMessage($message);
        $this->channel->basic_publish($message, $this->exchange);
    }

    public function closeConnection()
    {
        $this->channel->close();
        $this->connection->close();
    }
}