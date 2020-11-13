<?php

namespace App\Http\Controllers;

use App\Guestbook;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $GuestbookMessages = Guestbook::orderBy('created_at', 'desc')->get();

        return view('welcome',['GuestbookMessages' => $GuestbookMessages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'message' => 'required|max:400',
        ]);

        $data = $request->all();

        Guestbook::create($data);

        return redirect()->action('GuestbookController@index')->with('success','Sikeres mentés');
    }
}
