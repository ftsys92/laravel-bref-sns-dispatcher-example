<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\SnsPublishRequest;
use App\Services\Sns\SnsPublisher;
use Illuminate\Http\JsonResponse;

class SnsController
{
    public function publish(SnsPublishRequest $request, SnsPublisher $snsPublisher): JsonResponse
    {
        $result = $snsPublisher->publish($request->input('message'));

        return new JsonResponse($result->getMessageId());
    }
}
