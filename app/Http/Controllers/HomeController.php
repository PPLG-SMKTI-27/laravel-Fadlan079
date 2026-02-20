<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $recentProjects = Project::recent(3)->get();
        return view('pages.home',compact('recentProjects'));
    }

    public function Showabout(){
        return view('pages.about');
    }

    public function Showproject(Request $request)
    {
        $query = Project::query();

        if ($request->filled('search')) {
            $query->search($request->search);
        }

        if ($request->filled('type') && $request->type !== 'all') {
            $query->filterType($request->type);
        }

        $projects = $query->latest()->paginate(3)->withQueryString();
        $summary  = Project::summary();

        return view('pages.project', compact('projects', 'summary'));
    }

    public function Showcontact(){
        return view('pages.contact');
    }
}
