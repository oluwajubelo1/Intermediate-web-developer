<?php

namespace App\Http\Requests;

use App\BlockUser;
use App\CreditCard;
use App\Http\Controllers\CreditCardController;
use App\Jobs\SendMailToAdmin;
use App\User;
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
                #block customer
                User::whereId(auth()->user()->id)->update(['isBlocked' => 1]);
                //check if user exists on block_user tables
                $isExist = BlockUser::whereCustomerId(auth()->user()->id)->first();
                if (!$isExist) {
                    #save reason for blocking user
                    $reason = "Card Already exist!";
                    BlockUser::create([
                        'reason' => $reason
                    ]);
                }

                dispatch((new SendMailToAdmin($checkCardNumber->id, $number))->delay(Carbon::now()->addSeconds(5)));
                return redirect()->action([CreditCardController::class, 'index'])->with('success', 'Card Already exist!');
            }
        });
    }
}
