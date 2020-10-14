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
        return view('home');
    }

    public function add(Request $request) 
    {
        $validatedData = $request->validate([
            'message' => 'required',
        ]);

        $user = Auth::user();
        $now = Carbon::now();
        $params = [
            'user_id' => $user->id,
            'name' => $user->name,
            'message' => $request->message,
            'created_at' => $now,
        ];

        DB::table('messages')->insert($params);
        return redirect('/home');
    }

    public function getData()
    {
        $messages = Message::orderBy('created_at','asc')->get();
        $json = ['messages' => $messages];
        return response()->json($json);
    }
}
