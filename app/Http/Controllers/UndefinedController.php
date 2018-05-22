<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UndefinedController extends Controller
{


    public function __construct() {
        $this->middleware('auth');
    }


    public function index(Request $request) {
        $tasks = $request->user()->undefined()->get();
        return view('undefined.index', [
            'tasks' => $tasks,
        ]);
    }


    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $request->user()->undefined()->create([
            'name' => $request->name,
        ]);
        return redirect('/undefineds');
    }
}
