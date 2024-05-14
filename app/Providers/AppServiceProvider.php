<?php

namespace App\Providers;

use App\Services\Sns\SnsPublisher;
use AsyncAws\Sns\SnsClient;
use Illuminate\Support\ServiceProvider;
use RuntimeException;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->registerSnsPublisher();
    }

    public function boot(): void
    {
    }

    private function registerSnsPublisher()
    {
        $this->app->singleton(SnsPublisher::class, function ($app) {
            $key = $app->config->get('services.sns.key');
            $secret = $app->config->get('services.sns.secret');
            $token = $app->config->get('services.sns.token');
            $region = $app->config->get('services.sns.region');
            $topicArn = $app->config->get('services.sns.topic_arn');

            if (!$key || !$secret || !$region || !$topicArn || !$token) {
                throw new RuntimeException('Missing SNS config!');
            }

            return new SnsPublisher(
                new SnsClient([
                    'accessKeyId' => $key,
                    'accessKeySecret' => $secret,
                    'sessionToken' => $token,
                    'region' => $region,
                ]),
                $topicArn,
            );
        });
    }
}
