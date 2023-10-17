<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    // public function index(): View
    // {
    //     $status = DB::table('status')
    //         ->join('statustype', 'status.statusTypeId', '=', 'statustype.statusTypeId') // Fixed typo here
    //         ->select('status.*', 'statustype.statusType')
    //         ->get();

    //     return view('admin.SettingsAndConfigurations.status.index', ['status' => $status]);
    // }

    public function index(): View
    {
        $status = DB::table('status')
            ->join('statustype', 'status.statusTypeId', '=', 'statustype.statusTypeId')
            ->select('status.*', 'statustype.statusType')
            ->get();

        $statusType = DB::table('statusType')->get();

        return view('admin.SettingsAndConfigurations.status.index', ['status' => $status, 'statusType' => $statusType]);
    }


    public function create(): View
    {
        $status = DB::table('statusType')->get();
        return view('admin.SettingsAndConfigurations.status.create', ['status' => $status]);
    }

    
}
