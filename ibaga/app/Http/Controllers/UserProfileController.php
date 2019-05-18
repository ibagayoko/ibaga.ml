<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
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
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param string $username
     *
     * @return \Illuminate\Http\Response
     */
    public function show(string $username)
    {
        $user = User::byUsername($username)->first();
        if ($user) {
            $data = [
                'user'  => $user,
                'posts' => $user->posts,
            ];

            return view('users.profile', compact('data'));
        } else {
            abort(404);
        }
    }

    /**
     * Display the authentificate user .
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
        $user = Auth::user();

        return redirect(route('users.showProfile', $user->username));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * name, bio attrs.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User         $user
     *
     * @return \Illuminate\Http\Response
     */
    public function updateInfo(Request $request, string $username)
    {
        $user = User::byUsername($username)->first();
        if ($user) {
            $data = [
                'id'   => request('id'),
                'name' => request('name'),
                'bio'  => request('bio'),
            ];

            validator($data, [
                'name' => 'required',
            ])->validate();

            $user->fill($data);
            $user->save();
        }

        return redirect(route('users.showProfile', $username));
    }

    /**
     * Update the specified resource in storage.
     * name, bio attrs.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User         $user
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, string $username)
    {
        $user = User::byUsername($username)->first();
        if ($user) {
            $messages = [
                'current_password.required' => 'Please enter current password',
                'password.required'         => 'Please enter password',
            ];

            $data = [
                'current-password'      => request('current-password'),
                'password'              => request('password'),
                'password_confirmation' => request('password_confirmation'),
            ];
            validator($data, [
                'current-password'      => 'required',
                'password'              => 'required|string|min:8|same:password',
                'password_confirmation' => 'required|same:password',
            ], $messages)->validate();
            $current_password = $user->password;

            if (Hash::check($data['current_password'], $current_password)) {
                $user->password = Hash::make($data['password']);
                $user->save();
            }
        }

        return redirect(route('users.showProfile', $username));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
