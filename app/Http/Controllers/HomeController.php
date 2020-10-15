<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $messages = Message::get();
        return view('home',['messages' => $messages]);
    }

    public function add(Request $request) 
    {
        $validatedData = $request->validate([
            'message' => 'required',
        ]);

        $user = Auth::user();
        
        $now = Carbon::now();
       
        $date = date('m/j(D) g:i A', strtotime($now));

        $msg = new Message;
        $msg->user_id = $user->id;
        $msg->name = $user->name;
        $msg->message = $request->message;
        $msg->date_time = $date;
        $msg->save();
        
        return redirect('/home');
    }

    public function getData()
    {
        $messages = Message::orderBy('created_at','desc')->get();
        $json = ['messages' => $messages];
        return response()->json($json);
    }
}
