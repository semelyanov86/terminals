<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        try{
            $this->authorize('viewAny', auth()->user());
        } catch (AuthorizationException $ex) {
            abort(403);
        }
        $users = User::all();
        return view('users', compact('users'));
    }
    public function create()
    {
        $this->authorize('create', auth()->user());
        $user = new User();
        $roles = Role::get();
        return view('create-user', compact('roles', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request) {
        if ($request->id) {
            $this->authorize('update', User::whereId($request->id)->first());
        } else {
            $this->authorize('create', auth()->user());
        }
        $user = User::updateOrCreate(['id' => $request->id], [
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);
//        $user = User::create($request->only('email', 'name', 'password')); //Retrieving only the email and password data
        if ($request->image) {
            $avatarName = $user->id.'_avatar'.time().'.'.request()->image->getClientOriginalExtension();

            $request->image->storeAs('public/avatars',$avatarName);

            $user->image = $avatarName;
            $user->save();
        }

        $roles = $request->roles; //Retrieving the roles field
        //Checking if a role was selected
        $user->roles()->sync($roles);
        //Redirect to the users.index view and display message
        return redirect()->route('users.list')
            ->with('message',
                'User successfully updated.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::findOrFail($id); //Get user with specified id
        $this->authorize('update', $user);
        $roles = Role::get(); //Get all roles

        return view('create-user', compact('user', 'roles')); //pass user and roles data to view

    }

    public function view($id)
    {
        $user = User::findOrFail($id);
        $this->authorize('view', $user);
        return view('profile', compact('user'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.list')
            ->with('message',
                'User successfully deleted.');
    }
}
