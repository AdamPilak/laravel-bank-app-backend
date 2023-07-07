<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BankUser;

class BankUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('bank_users')->get();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payload = (object)$request->all();
        $user = $payload;
        $ret = BankUser::create([
            "name" => $user->name ?? null,
            "surname" => $user->surname ?? null,
            "username" => $user->username ?? null,
            "password" => $user->password ?? null,
            "email" => $user->email ?? null,
            "pesel" => $user->pesel ?? null,
            "dateOfBirth" => date('Y-m-d H:i:s', strtotime($user->birthdate)) ?? null,
            "sex" => $user->sex ?? null,
            "phoneNumber" => $user->phoneNumber ?? null,
            "accountNumber" => $user->accountNumber ?? null,
            "saldo" => $user->saldo ?? null,
            "activeCredits" => $user->activeCredits ?? null,
        ]);
        $ret->save();
        return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        return DB::table('bank_users')->where('username', $username)->first();
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
        $payload = (object)$request->all();
        $user = BankUser::find($id);
        $user->update([
            "saldo" => $user->saldo + $payload->saldo,
            "activeCredits" => $user->activeCredits + $payload->credit
        ]);
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkIfUserExists(Request $request)
    {
        $payload = (object)$request->all();
        $unknownUser = $payload;
        if(DB::table('bank_users')->where('username', $unknownUser->username)->count() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function checkIfUserIsValid(Request $request)
    {
        $payload = (object)$request->all();
        $unknownUser = $payload;
        if(DB::table('bank_users')->where('username', $unknownUser->username)->where('password', $unknownUser->password)->count() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
}
