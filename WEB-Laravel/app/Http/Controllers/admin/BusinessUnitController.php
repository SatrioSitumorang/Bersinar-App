<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class BusinessUnitController extends Controller
{
    public function index(): View
    {
        $businessUnits = DB::table('businessUnit')->get();
        return view('admin.SettingsAndConfigurations.businessUnit.index', ['businessUnits' => $businessUnits]);
    }

    public function create(): View
    {
        return view('admin.SettingsAndConfigurations.businessUnit.create');
    }

}


