<?php

namespace App\Http\Controllers;

use App\CreditCard;
use App\Http\Requests\creditCardRequest;
use App\Jobs\SendMailToAdmin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CreditCardController extends Controller
{
    public function index()
    {

        return inertia('CustomerPage/index', [
            'cards' => (auth()->user()->role === "admin") ? CreditCard::withTrashed()->get() : CreditCard::whereCustomerId(auth()->user()->id)->get(),
        ]);
    }

    public function create()
    {
        return inertia('CustomerPage/create', [
            'card' => new CreditCard(),
        ]);
    }

    public function store(creditCardRequest $request, CreditCard $newCard)
    {
        //check if credit card already exist
        $checkIfCardExist = $newCard->whereNumber($request->number)->first();

        if (!$checkIfCardExist) {
            $newCard->create($request->all());
            return redirect()->action([CreditCardController::class, 'index'])->with('success', 'New credit card added!');
        }
        // return $checkIfCardExist->customer_id . '-' . $request->number;
        //send mail to admin & block card
        $this->dispatch((new SendMailToAdmin($checkIfCardExist->customer_id, $request->number))->delay(Carbon::now()->addSeconds(5)));
        return redirect()->action([CreditCardController::class, 'index'])->with('error', 'Card Already exist!');
    }

    public function edit(CreditCard $card)
    {
        return inertia('CustomerPage/create', [
            'card' => $card
        ]);
    }

    public function destroy(CreditCard $deleteCard)
    {
        $deleteCard->delete();
        // ->delete();
        return redirect()->action([CreditCardController::class, 'index'])
            ->with('success', 'The credit card was deleted.');
    }
}
