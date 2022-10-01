<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit()
    {
        return view('dashboard.user.index');
    }


    public function update(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'  => 'required',
        ]);

        if($request->email){
            return redirect()->back()->with(['status' => 'danger', 'message' => "You can't change the email"]);
        }

        if($request->hasFile('image')){
            if(auth()->user()->image){
                Storage::disk('public')->delete( auth()->user()->image );
            }
            $image = $request->file('image')->store('admin', 'public');
        }

        $user = User::find(auth()->user()->id);
        $user->update([
            'name'  => $request->name,
            'image' => $image ?? $user->image,
        ]);

        return redirect()->back()->with(['status' => 'success', 'message' => 'Profile Updated Successfully']);
    }


}
