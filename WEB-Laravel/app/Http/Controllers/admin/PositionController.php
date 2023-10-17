<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PositionController extends Controller
{
    public function index()
    {
        $response = Http::get(Config('app.api_url') . 'position/viewAll');
        $position = $response->json();
        // dd($position);
        return view('admin.SettingsAndConfigurations.position.index', compact('position'));
    }

    public function create()
    {
        return view('admin.SettingsAndConfigurations.position.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'positionName' => 'required',
            'description' => 'required',
        ]);
        $response = Http::post(Config('app.api_url') . 'position/insert', [
            'positionName' => $request->input('positionName'),
            'description' => $request->input('description')
        ]);
        return redirect()->route('position.index')->with('success', 'Jabatan berhasil ditambahkan');
        if ($response->successful()) {
            return response()->json(['message' => 'Jabatan berhasil ditambahkan.'], 200);
        } else {
            return response()->json(['message' => 'Gagal menambahkan Jabatan.'], 400);
        }
    }

    public function detail($id)
    {
        $response = Http::get(Config('app.api_url') . 'position/viewById?id=' . $id);
        if ($response->successful()) {
            $position = $response->json()['data'];
            return view('admin.SettingsAndConfigurations.position.detail', compact('position'));
        } else {
            return redirect()->route('position.index')->with('error', 'Jabatan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        $response = Http::get(Config('app.api_url') . 'position/viewById?id=' . $id);
        $temp = $response->json();
        $positionData = $temp['data'];
        if (!$positionData) {
            return redirect()->route('position.index')->with('error', 'Jabatan tidak ditemukan.');
        }
        return view('admin.SettingsAndConfigurations.position.update', compact('positionData'));
    }

    public function update(Request $request, $id)
    {
        try {
            $response = Http::put(config('app.api_url') . 'position/update', [
                'positionId' => (int)$id,
                'positionName' => $request->input('positionName'),
                'description' => $request->input('description'),
            ]);
            if ($response->successful()) {
                return redirect()->route('position.index')->with('success', 'Jabatan berhasil diupdate.');
            } else {
                return back()->withErrors('Gagal mengupdate Jabatan.')->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat memperbarui Jabatan.')->withInput();
        }
    }

    public function hapus($id)
    {
        try {
            $response = Http::delete(config('app.api_url') . 'position/deleteById?id=' . $id);
            if ($response->successful()) {
                return redirect()->route('position.index')->with('success', 'Jabatan berhasil dihapus.');
            } else {
                return redirect()->route('position.index')->with('error', 'Jabatan gagal dihapus.');
            }
        } catch (\Exception $e) {
            return redirect()->route('position.index')->with('error', 'Jabatan gagal dihapus.');
        }
        // $response = Http::delete(config('app.api_url') . 'position/deleteById?id=' . $id);
        // if ($response->successful()) {
        //     return redirect()->route('position.index')->with('success', 'Jabatan berhasil dihapus.');
        // } else {
        //     return back()->withErrors('Gagal menghapus Jabatan.');
        // }
    }
}
