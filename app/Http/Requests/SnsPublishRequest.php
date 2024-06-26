<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SnsPublishRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'message' => ['required', 'string'],
        ];
    }
}
