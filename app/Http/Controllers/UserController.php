<?php

namespace App\Http\Controllers;

use Silber\Bouncer\Database\Role;
use App\User;
use Illuminate\Http\Request;
use Bouncer;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit', ['user' => $user, 'roles' => $roles] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $attributes = $this->validateUser();
        // dd($user);
        $user->update($attributes);
        //dd($request->input('role'));
        // foreach ($request->input('role') as $role) {
        //     $user->assign($role);
        // }
        Bouncer::sync($user)->roles((array)$request->input('role'));
        //$user->roles()->sync((array)$request->input('role'));

        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    protected function validateUser()
    {
        return request()->validate([
            'name' => 'required',
            'street' => 'string|nullable',
            'number' => 'string|nullable',
            'postcode' => 'string|nullable',
            'city' => 'string|nullable',
            'counytry' => 'string|nullable'
        ]);
    }

}
