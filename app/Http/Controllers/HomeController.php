<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(10);
        return view('home')->with('testimonials', $testimonials);
    }
    public function deleteTestimonial(Request $request)
    {
        $id = $request->input('id');
        $authid = Auth::user()->id;
        $testimonial = Testimonial::where('user_id',$authid)
            ->where('id',$id);
        $testimonial->delete();
        return redirect()->route('messages')->with('status', trans('messages.deleted_testimonial'));
    }
}
