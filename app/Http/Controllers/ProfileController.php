<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Storage;
use App\Testimonial;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=> ['getUsername', 'storeTestimonial']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.profile');
    }
    public function updatePicture(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|image|max:1000',
        ]);
        $user = Auth::user();
        if($user->avatar == 'public/avatars/default.jpg')
        {
            $path = Storage::putFile("public/avatars", $request->file('avatar'), 'public');
            $user->avatar= $path;
            $user->save();
            return redirect()->route('profile')->with('status', trans('messages.updated_picture'));

        }
        else {
            $user = Auth::user();
            $delete = Storage::delete($user->avatar);
            $path = Storage::putFile("public/avatars", $request->file('avatar'), 'public');
            $user->avatar= $path;
            $user->save();
            return redirect()->route('profile')->with('status', trans('messages.updated_picture'));
        }
    }
    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'bio'=> 'required',
        ]);
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->bio = $request->input('bio');
        $user->save();
        return redirect()->route('profile')->with('updated_profile', trans('messages.updated_profile'));
    }
    public function getUsername($username)
    {
        $user = User::where('username', $username)->first();
        if(!$user)
        {
            abort(404);
        }

        return view('pages.username')->with('user', $user);
    }
    public function storeTestimonial(Request $request)
    {
        $this->validate($request, [
            'message'=> 'required|min:10',
        ]);
        $testimonial = new Testimonial;
        $testimonial->user_id = $request->input('id');
        $testimonial->message = $request->input('message');
        if($request->input('pseudo'))
        {
            $testimonial->pseudo = $request->input('pseudo');
        }
        $testimonial->save();
        return back()->with('status', trans('messages.added_testimonial'));
    }
}
