<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesignerController extends Controller
{
    public function index()
    {   
        $projects = DB::table('projects')->get()->count();
        $done = DB::table('projects')->where('status', '3')->count();
        $progress = DB::table('projects')->where('status', '2')->count();
        $waiting = DB::table('projects')->where('status', '1')->count();

        return view('pages.designer_dashboard', ['projects' => $projects, 'done' => $done, 'progress' => $progress, 'waiting' => $waiting]);
    }

    public function show_projects()
    {
        $projects = DB::table('projects')->get();
        return view('pages.designer_manage_projects', ['projects' => $projects]);
    }

    public function add_project(Request $request)
    {
        DB::table('projects')->insert([

            'nama'          => $request->textName,
            'keterangan'   => $request->textKet,
            'status'        => $request->textStatus

        ]);

        return redirect('/designer_projects');
    }

    public function destroy_project($id)
    {
        
        DB::table('projects')->where('id', $id)->delete();
    
        return redirect('/designer_projects');
    }

    public function update_project(Request $request, $id)
    {
        $data   = [
                    'nama'          => $request->textName,
                    'keterangan'    => $request->textKet,
                    'status'        => $request->textStatus
                  ]; 

        DB::table('projects')->where('id', $id)->update($data);
    
        return redirect('/designer_projects');
    }
}
