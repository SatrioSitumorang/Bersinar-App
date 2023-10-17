<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class OccupationController extends Controller
{
    public function index(): View
    {
        $response = Http::get(Config('app.api_url') . 'occupation/viewAll');
        $occupation = $response->json();
        return view('admin.SettingsAndConfigurations.occupation.index', compact('occupation'));
    }

    public function create(): View
    {
        return view('admin.SettingsAndConfigurations.occupation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'occupationName' => 'required',
            'description' => 'required',
        ]);
        $response = Http::post(Config('app.api_url') . 'occupation/insert', [
            'occupationName' => $request->input('occupationName'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('occupation.index')->with('success', 'Pekerjaan berhasil ditambahkan');
        if ($response->successful()) {
            return response()->json(['message' => 'Pekerjaan berhasil ditambahkan.'], 200);
        } else {
            return response()->json(['message' => 'Gagal menambahkan Pekerjaan.'], 400);
        }
    }

    public function show($id): View
    {
        $response = Http::get(Config('app.api_url') . 'occupation/viewById?id=' . $id);
        if ($response->successful()) {
            $occupation = $response->json()['data'];
            return view('admin.SettingsAndConfigurations.occupation.show', compact('occupation'));
        } else {
            return redirect()->route('occupation.index')->with('error', 'Pekerjaan tidak ditemukan.');
        }
    }

    public function edit($id): View
    {
        $response = Http::get(Config('app.api_url') . 'occupation/viewById?id=' . $id);
        $temp = $response->json();
        $occupationData = $temp['data'];
        if (!$occupationData) {
            return redirect()->route('occupation.index')->with('error', 'Pekerjaan tidak ditemukan.');
        }
        return view('admin.SettingsAndConfigurations.occupation.edit', compact('occupationData'));
    }

    public function update(Request $request, $id)
    {
        try {
            $response = Http::put(config('app.api_url') . 'occupation/update', [
                'occupationId' => (int)$id,
                'occupationName' => $request->input('occupationName'),
                'description' => $request->input('description'),
            ]);
            if ($response->successful()) {
                return redirect()->route('occupation.index')->with('success', 'Pekerjaan berhasil diupdate.');
            } else {
                return back()->withErrors('Gagal mengupdate Pekerjaan.')->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat memperbarui Pekerjaan.')->withInput();
        }
    }

    public function destroy($id)
    {
        // try {
            $response = Http::delete(config('app.api_url') . 'occupation/deleteById?id=' . $id);
            if ($response->successful()) {
                return redirect()->route('occupation.index')->with('success', 'Pekerjaan berhasil dihapus.');
            } else {
                // return redirect()->route('occupation.index')->with('error', 'Pekerjaan gagal dihapus.');
                return redirect()->route('occupation.index')->with('error', 'Pekerjaan gagal dihapus.');
            }
        // } catch (\Exception $e) {
        //     return redirect()->route('occupation.index')->with('error', 'Pekerjaan gagal dihapus.');
        // }
    }
}
