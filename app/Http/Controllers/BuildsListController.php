<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildsListController extends Controller
{
    public function viewBuildsList(){
        return view("builds-list");
    }
}
