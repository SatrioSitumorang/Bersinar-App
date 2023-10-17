<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StatusTypeController extends Controller
{
    public function index()
    {
        $response = Http::get(Config('app.api_url') . 'statusType/viewAll');
        $statusType = $response->json();
        return view('admin.SettingsAndConfigurations.statusType.index', compact('statusType'));
    }

    public function create()
    {
        return view('admin.SettingsAndConfigurations.statusType.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'statusType' => 'required',
            'description' => 'required',
        ]);

        $response = Http::post(Config('app.api_url') . 'statusType/insert', [
            'statusType' => $request->input('statusType'),
            'description' => $request->input('description')
        ]);

        if ($response->successful()) {
            return response()->json(['message' => 'Jenis Status berhasil ditambahkan.'], 200);
        } else {
            return response()->json(['message' => 'Gagal menambahkan Jenis Status.'], 400);
        }
    }

    public function edit($id)
    {
        $response = Http::get(Config('app.api_url') . 'statusType/viewById?id=' . $id);
        $temp = $response->json();
        $statusTypeData = $temp['data'][0];

        if (!$statusTypeData) {
            return response()->json(['error' => 'Jenis Status tidak ditemukan.']);
        }
        return response()->json($statusTypeData);
    }


    public function update(Request $request, $id)
    {
        try {
            $response = Http::put(config('app.api_url') . 'statusType/update', [
                "statusTypeId" => (int)$id,
                'statusType' => $request->input('statusType'),
                'description' => $request->input('description')
            ]);
            if ($response->successful()) {
                return redirect()->route('statusType.index')->with('success', 'Jenis Status berhasil diupdate.');
            } else {
                return back()->withErrors('Gagal mengupdate Jenis Status.')->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat memperbarui Jenis Status.')->withInput();
        }
    }

    public function hapus($id)
    {
        $response = Http::delete(config('app.api_url') . 'statusType/deleteById?id=' . $id);
        if ($response->successful()) {
            return redirect()->route('statusType.index')->with('success', 'Jenis Status berhasil dihapus.');
        } else {
            return back()->withErrors('Gagal menghapus Jenis Status.');
        }
    }

    public function detail($id)
    {
        $response = Http::get(Config('app.api_url') . 'statusType/viewById?id=' . $id);
        if ($response->successful()) {
            $statusType = $response->json()['data'][0];
            return view('admin.SettingsAndConfigurations.statusType.show', compact('statusType'));
        } else {
            return redirect()->route('statusType.index')->with('error', 'Jenis Status Darah tidak ditemukan.');
        }
    }
}
