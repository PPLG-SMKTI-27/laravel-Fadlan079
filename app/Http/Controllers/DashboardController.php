<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $recentProjects = Project::recent(3)->get();
        $latestProject = Project::latest('updated_at')->first();

        return view('dashboard.index', [
            'recentProjects' => $recentProjects,
            'latestProject' => $latestProject
        ]);
    }
}
