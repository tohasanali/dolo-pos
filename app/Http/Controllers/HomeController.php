<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return redirect()->route('admin.dashboard');
        return redirect()->route('employee.login');
    }
    public function page404()
    {
        return view('errors.page404');
    }
}
