<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Redirector;
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

    /**
     * Add password
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function addPassword(Request $request) {
        $password = new Passwords;

        $password->name = $request->name;

        $int = [];

        preg_match('/;/', $request->password, $int, PREG_OFFSET_CAPTURE);

        $password->password = encrypt(substr($request->password,$int[0][1]+1));

        if ($request->filled('comment')) {
            $password -> comment = $request -> comment;
        }
        $password -> save();
        return redirect()->route('passwords');
    }

    public function getPasswords(Request $request) {
        $find = Passwords::all();
        $passwords = [];
        foreach( $find as $key => $pass) {
            $tmp = $pass;
            $tmp->password = decrypt($pass->password);
            array_push($passwords,$tmp);
        }
        return jsone_encode($password);
    }

    public function updatePassword(Request $request) {
        $found = Passwords::find($request->id);

        if ($request->filled('name')) {
            $password -> name = $request -> name;
        }
        if ($request->filled('password')) {
            $password -> password = $request -> password;
        }
        if ($request->filled('username')) {
            $password -> username = $request -> username;
        }
        if ($request->filled('comment')) {
            $password -> comment = $request -> comment;
        }
        if ($request->filled('url')) {
            if(@preg_match('/^(http|https):\/\/.+\.[a-z]+$/',$request->url) == true) $password -> url = $request -> url;
        }

        $found->save();

        return redirect()->route('passwords');
    }
}
