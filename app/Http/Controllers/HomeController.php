<?php

namespace App\Http\Controllers;

use App\Passwords;
use Illuminate\Http\Request;

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
        return view('home.main');
    }

    /**
     * Show passwords dashboard (test)
     *
     * @return \Illuminate\Http\Response
     */
    public function passwords()
    {
        $find = Passwords::all();
        $passwords = [];
        foreach( $find as $key => $pass) {
            $tmp = $pass;
            $tmp->password = decrypt($pass->password);
            array_push($passwords,$tmp);
        }

        return view('home.passwords', ['passwords' => $find]);
    }

    public function addPassword(Request $request) {
        $password = new Passwords;

        $password->name = $request->name;

        $password->password = encrypt($request->password);

        if ($request->filled('comment')) {
            $password -> comment = $request -> comment;
        }
        $password -> save();

    }
}
