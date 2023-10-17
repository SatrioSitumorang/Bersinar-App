<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class DepartmentController extends Controller
{
    public function index()
    {
        $response = Http::get(Config('app.api_url') . 'department/viewAll');
        $department = $response->json();
        return view('admin.SettingsAndConfigurations.department.index', compact('department'));
    }

    public function create()
    {
        return view('admin.SettingsAndConfigurations.department.create');
    }
}
