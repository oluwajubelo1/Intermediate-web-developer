<?php

namespace App\Policies;

use App\CreditCard;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CardPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return;
    }

    public function view(User $user, CreditCard $card)
    {
        return;
    }
    public function create(User $user)
    {
        return;
    }
    public function update(User $user, CreditCard $card)
    {
        if (!$card->customer) {
            return true;
        }

        return $card->customer->is($user);
    }

    public function viewCustomer()
    {
        return;
    }

    public function delete(User $user, CreditCard $card)
    {
        if (!$card->customer) {
            return true;
        }
        return $card->customer->is($user);
    }

    public function restore(User $user, CreditCard $card)
    {
        if (!$card->customer) {
            return true;
        }
        return $card->customer->is($user);
    }

    public function forceDelete(User $user, CreditCard $card)
    {
        if (!$card->customer) {
            return true;
        }
        return $card->customer->is($user);
    }
}
