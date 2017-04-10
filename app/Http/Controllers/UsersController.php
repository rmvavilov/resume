<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\UsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        $user = Auth::user();

        $user->last_name = $request->input('last_name');
        $user->first_name = $request->input('first_name');
        $user->date_of_birth = $request->input('date_of_birth');
        $user->phone = str_replace('-', '', $request->input('phone'));

        $user->save();

        return redirect()->back();
    }

    public function deleteImage(Request $request)
    {
        User::deleteUserAvatar();

        return redirect()->back();
    }

    public function updateImage(Request $request)
    {
        if ($request->has('img')) {
            if ($request->input('img') === 'true') {
                // change settings
            } else {
                // change image
                if ($request->hasFile('avatar')) {
                    $user = Auth::user();
                    $avatar_file = $request->file('avatar');
                    $avatar_file_name = 'u_' . $user->id . '_avatar.' . $avatar_file->getClientOriginalExtension();
                    $old_avatar_file_name = $user->avatar;
                    // delete old file
                    if ($old_avatar_file_name != User::DEFAULT_USER_IMAGE) {
                        File::delete(public_path(User::AVATAR_PATH) . $old_avatar_file_name);
                    }
                    // crete new file
                    Image::make($avatar_file)->resize(250, 250)->save(public_path(User::AVATAR_PATH) . $avatar_file_name);
                    $user->avatar = $avatar_file_name;
                    $user->save();
                }
            }
        }

        return redirect()->back();
    }

    public function deleteAccount(Request $request)
    {
        $password = $request->input('password');
        if ($password) {
            if (Hash::check($password, Auth::user()->getAuthPassword())) {
                $user = User::find(Auth::user()->id);
                User::deleteUserAvatar();
                Auth::logout();
                if ($user->delete()) {
                    // TODO:
                    // add popup message 'Account was successfully deleted'
                    // return Redirect::route('/')->with('global', 'Your account has been deleted!');
                    // send email notification about deleted account
                    return redirect('/');
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
