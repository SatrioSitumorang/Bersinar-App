<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        return view('admin.DataMaster.supplier.index');
    }

    public function create(){
        return view('admin.DataMaster.supplier.create');
    }
}
