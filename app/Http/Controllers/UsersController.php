<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param User $model
     * @return \Illuminate\Http\Response
     */
    public function index(User $model)
    {

        if (Gate::denies('edit_users')) {
            return redirect()->route('home')
                ->with('status','You\'re not able to visit this route please if you have any question contact the manager ');
        }

        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */

    public function edit(User $user)
    {

        if (Gate::denies('edit_users')) {
            return redirect()->route('users.index')->with('status','You\'re not able to edit users only the admin can');
        }

            $roles = Role::all();
            return view('users.edit', [
                'user' => $user,
                'roles' => $roles
            ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {


        $user->roles()->sync($request->roles);

        return redirect()->route('users.index' , ['status' => 'User status updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {

        if (Gate::denies('delete_users')) {
            return redirect()->route('users.index')->with('status','You\'re not able to delete a user only the admin can');
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('users.index');
    }
}
