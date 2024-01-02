<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    //
    
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {
        $user = User::where("username",'LIKE', '%' . strtolower($user) . '%')->firstOrFail();
        return view('profiles.index',compact('user'));
    }
    public function edit($user)
    {
        $user = base64_decode($user);
        $user = User::where('id',$user)->firstOrFail();
        $this->authorize('update', $user->profile);
        return view('profiles.edit',compact('user'));
    }
    public function update(Request $request,$user)
    {   
        $user = base64_decode($user);
        $user = User::where('id',$user)->firstOrFail();
        $this->authorize('update', $user->profile);
       $validate= $request->validate([
            'title'=> ['required','string',''],
            'description'=> ['required','string',''],
            'url'=> ['url'],
            'image'=> [''],
       ]);
    //    dd($request->image);
       if($request->image) {
           $imagePath = $request->image->store('profile', 'public');
           Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000)->save();
           $imageArray = ['image' => $imagePath];
       }

       Auth::user()->profile->update(array_merge(
        $validate,
        $imageArray ?? []
       ));
       return redirect("/profile/{$user->username}");
    }
}
