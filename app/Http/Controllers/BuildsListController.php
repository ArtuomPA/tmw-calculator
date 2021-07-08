<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Build;
use Illuminate\Support\Facades\Auth;

class BuildsListController extends Controller
{
    public function viewBuildsList(){
        $builds = [];
        if (Auth::check()){
            $builds = Auth::user()->builds;
        }
                
        return view("builds-list", ["builds" => $builds]);
    }
}
