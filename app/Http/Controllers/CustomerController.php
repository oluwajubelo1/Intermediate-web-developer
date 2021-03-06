<?php

namespace App\Http\Controllers;

use App\BlockUser;
use App\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('isAdmin');
        return inertia('CustomerPage/index', [
            'customers' => (auth()->user()->role === "admin") ? User::where('role', '!=', 'admin')->get(['id', 'firstname', 'lastname', 'email', 'isBlocked']) : 'not right',
        ]);
    }


    public function action(User $user, int $id, int $isBlocked)
    {
        $user->whereId($id)->update([
            'isBlocked' => ($isBlocked == 0) ? 1 : 0
        ]);
        //check if user exists on block_user tables
        $isExist = BlockUser::whereCustomerId($id)->first();
        // return $isExist;
        if ($isExist) {

            ($isBlocked == 1) ? BlockUser::whereCustomerId($id)->delete() : BlockUser::updateOrCreate(['customer_id' => $id, 'reason' => 'Admin blocked user']);
        } else {
            ($isBlocked == 0) ? BlockUser::updateOrCreate(['customer_id' => $id, 'reason' => 'Admin blocked user']) : BlockUser::whereCustomerId($id)->delete();
        }


        $statement = ($isBlocked == 0) ? 'blocked' : 'unblocked';
        return redirect()->action([CustomerController::class, 'index'])
            ->with('success', "Customer is {$statement}.");
        // $user->whereI
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(\App\User $deleteUser, $id)
    {
        $deleteUser->find($id)->delete();
        // ->delete();
        return redirect()->action([CustomerController::class, 'index'])
            ->with('success', 'User was deleted.');
    }
}
