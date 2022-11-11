<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\HasMedia;
use Illuminate\Http\Request;

class UserProfile extends Controller
{


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('User/profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:1024'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $user = User::findOrFail(auth()->user()->id);
        if ($request->hasFile('image')) {
            $imageName = HasMedia::upload($request->file('image'), public_path('images\users'));
            if ($user->image) {
                HasMedia::delete(public_path('images\users\\' . $user->image));
            }
            $data['image'] = $imageName;
        }
        $data['name'] = $request->name;
        $user->update($data);

        return redirect()->route('user.edit');
    }
}
