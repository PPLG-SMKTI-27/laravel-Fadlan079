<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
public function index()
    {
        return view('pages.home');
    }

    public function Showabout(){
        return view('pages.about');
    }

    public function Showproject()
    {
        $projects = Project::latest()->paginate(3);
        $summary  = Project::summary();
        return view('pages.project', compact('projects','summary'));
    }

    public function Showcontact(){
        return view('pages.contact');
    }
}
