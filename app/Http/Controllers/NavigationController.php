<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function index()
    {
        $navItems = Navigation::orderBy('id', 'asc')->get();
        return view('components.navigation.view', ['navItems' => $navItems]);
    }
}
