<?php

namespace App\Http\Requests\DelayRequests;

use Brick\Math\BigInteger;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property BigInteger vendor_id
 */
class GetReportPerVendorRequest extends FormRequest
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
            'vendor_id' => 'required|exists:vendors,id'
        ];
    }

    public function messages()
    {
        return [
            'vendor_id.required' => 'شناسه فروشگاه الزامی است.',
            'vendor_id.exists' => 'شناسه فروشگاه اشتباه است.',
        ];
    }
}
