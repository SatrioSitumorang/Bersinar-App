<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeePersonalController extends Controller
{
    public function index(){
        return view('admin.DataMaster.employee.index');
    }

    public function create(){
        return view('admin.DataMaster.employee.create');
    }
}
