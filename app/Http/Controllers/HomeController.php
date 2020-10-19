<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        return view('home', ['messages' => $messages, 'user' => $user]);
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'nullable',
            'image' => 'nullable|file|image',
        ]);

        if ($request->message === null && $request->file('image') === null) {
            return redirect('/home')->with('error_message', 'メッセージか画像のどちらかを入力してください');
        } else {

            $user = Auth::user();
            $now = Carbon::now();
            $date = date('m/j(D) g:i A', strtotime($now));

            if ($request->file('image') === null) {
                $image = '';
            } else {
                $path = $request->file('image')->store('public/image');
                $image = basename($path);
            }

            Message::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'message' => nl2br($request->message),
                'image' => $image,
                'date_time' => $date
            ]);

            return redirect('/home');
        }
    }

    public function getData()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();
        $json = ['messages' => $messages];
        return response()->json($json);
    }  
}
