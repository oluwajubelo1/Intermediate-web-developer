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
            'cards' => (auth()->user()->role === "admin") ? CreditCard::withTrashed()->get() : (User::whereId(auth()->user()->id)->value('isBlocked') == 0) ? CreditCard::whereCustomerId(auth()->user()->id)->get() : "blocked",
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
        $newCard->create($request->all());
        return redirect()->action([CreditCardController::class, 'index'])->with('success', 'New credit card added!');
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
