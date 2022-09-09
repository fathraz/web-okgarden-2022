<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.user_dashboard');
    }

    public function show_projects()
    {
        $projects = DB::table('projects')->get();
        return view('pages.projects', ['projects' => $projects]);
    }
}
