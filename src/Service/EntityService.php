<?php

namespace App\Service;

use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

class EntityService implements ConsumerInterface
{
    /**
     * @param AMQPMessage $message
     *
     * @return mixed|void
     */

    public function execute(AMQPMessage $message)
    {
        $body = json_decode($message->body, true);
        echo sprintf('Entity created - ID:%s @ %s ...', $body['id'], date('Y-m-d H:i:s')).PHP_EOL;
    }
}
