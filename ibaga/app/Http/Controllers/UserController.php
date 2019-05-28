<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [
            'users' => User::orderBy('id', 'DESC')->with('roles')->paginate(5),
        ];

        return view('users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Auth::user()->isAdmin) {
            $roles = Role::where('name', '!=', User::ADMIN_ROLE_NAME)->get();
        } else {
            $roles = Role::all();
        }

        $data = [
            'roles' => $roles,
        ];

        // dd($data);

        return view('users.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
            'roles' => 'required',
        ]);

        $input = $request->all();
        $user = new User();
        $uuid = (string) Str::uuid();
        $user->setUUID($uuid);
        $username = Str::slug($input['name'], '').Str::random(5);
        $user->setUsername($username);
        $username = Str::lower($username);
        $user->setSlug($username);

        $user->fill([
            'name'     => $input['name'],
            'email'    => $input['email'],
            'password' => Hash::make($input['password']),
            ]);

        $user->assignRole($request->input('roles')['id']);
        $user->save();

        return redirect()->route('users.index')
                        ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return redirect()->route('users.showProfile', $user->username);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $rolesName = $user->roles->map(function ($role) {
            return $role->name;
        })->all();
        $rolesId = $user->roles->keys()->all();

        if (! Auth::user()->isAdmin) {
            $roles = Role::where('name', '!=', User::ADMIN_ROLE_NAME)->get();
        } else {
            $roles = Role::all();
        }

        $data = [
            'user' => $user,
            'roles' => $roles,
            'userRole' => [
                'id' =>$rolesId,
                'name' =>$rolesName,
            ],

        ];

        return view('users.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'same:password_confirmation',
            'roles' => 'required',
        ]);

        $input = $request->all();
        if (! empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = array_except($input, ['password']);
        }

        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
                        ->with('success', 'User deleted successfully');
    }
}
