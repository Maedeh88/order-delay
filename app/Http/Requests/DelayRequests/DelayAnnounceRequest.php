<?php

namespace App\Http\Requests\DelayRequests;

use Brick\Math\BigInteger;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property BigInteger order_id
 */
class DelayAnnounceRequest extends FormRequest
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
            'order_id' => 'required|exists:orders,id'
        ];
    }

    public function messages()
    {
        return [
            'order_id.required' => 'شناسه سفارش الزامی است.',
            'order_id.exists' => 'شناسه سفارش اشتباه است.',
        ];
    }
}
