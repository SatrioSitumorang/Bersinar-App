<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CorporateController extends Controller
{
    public function index(){
        return view('admin.SettingsAndConfigurations.corporate.index');
    }

    public function create(){
        return view ('admin.SettingsAndConfigurations.corporate.create');
    }

    public function show(){
        return view('admin.SettingsAndConfigurations.corporate.show');
    }
}
