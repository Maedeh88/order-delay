<?php

namespace App\Http\Requests\QueueDelayRequests;

use Brick\Math\BigInteger;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property BigInteger agent_id
 */
class agentAssignRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'agent_id' => 'required|exists:agents,id'
        ];
    }

    public function messages()
    {
        return [
            'agent_id.required' => 'شناسه کارمند الزامی است.',
            'agent_id.exists' => 'شناسه کارمند اشتباه است.',
        ];
    }
}
