<?php

namespace App\Services\Sns;

use AsyncAws\Sns\SnsClient;
use AsyncAws\Sns\Input\PublishInput;
use AsyncAws\Sns\Result\PublishResponse;

final class SnsPublisher
{
    public function __construct(private SnsClient $client, private string $topic)
    {
    }

    public function publish(string $message): PublishResponse
    {
        return $this->client->publish(new PublishInput([
            'TopicArn' => $this->topic,
            'Message' => $message,
        ]));
    }
}
