<?php

namespace App\Http\Requests;

use App\CreditCard;
use App\Jobs\SendMailToAdmin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class creditCardRequest extends FormRequest
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
            'number' => 'required|digits:5',
            'expire' => 'required|date|after_or_equal:' . date("Y-m-d"),
            'brand' => 'required'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $number = $this->number;
            $checkCardNumber = CreditCard::whereNumber($number)->first();
            if ($checkCardNumber) {

                dispatch((new SendMailToAdmin($checkCardNumber->id, $number))->delay(Carbon::now()->addSeconds(5)));
                $validator->errors()->add('number', 'Card Already exist!');
            }
        });
    }
}
