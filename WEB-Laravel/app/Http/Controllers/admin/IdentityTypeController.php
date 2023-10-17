<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class IdentityTypeController extends Controller
{
    public function index(): View
    {
        $response = Http::get(Config('app.api_url') . 'identityType/viewAll');
        $identityType = $response->json();
        return view('admin.SettingsAndConfigurations.identityTypes.index', compact('identityType'));
    }

    public function create(): View
    {
        return view('admin.SettingsAndConfigurations.identityTypes.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'jenis_identitas' => 'required',
            'keterangan' => 'required',
        ]);

        DB::table('identityType')->insert([
            'identityType' => $request->input('jenis_identitas'),
            'description' => $request->input('keterangan'),
        ]);

        return redirect()->route('identityType.index')->with('success', 'Jenis identitas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_identitas' => 'required',
            'keterangan' => 'required',
        ]);

        DB::table('identityType')->where('identityTypeId', $id)->update([
            'identityType' => $request->input('jenis_identitas'),
            'description' => $request->input('keterangan'),
        ]);

        return redirect()->route('identityType.index')->with('success', 'Jenis identitas berhasil diupdate.');
    }

    public function edit($id): View
    {
        $identityType = DB::table('identityType')->where('identityTypeId', $id)->first();

        if (!$identityType) {
            return redirect()->route('identityType.index')->with('error', 'Jenis identitas tidak ditemukan.');
        }

        return view('admin.SettingsAndConfigurations.identityTypes.edit', compact('identityType'));
    }
    public function hapus($id)
    {
    DB::table('identitytype')->where('identityTypeId', $id)->delete();

    return redirect()->route('identityType.index')->with('success', 'Jenis identitas berhasil dihapus.');
    }
    public function show($id): View
    {
    $identityType = DB::table('identityType')->where('identityTypeId', $id)->first();

    if (!$identityType) {
        return redirect()->route('identityType.index')->with('error', 'Jenis identitas tidak ditemukan.');
    }

    return view('admin.SettingsAndConfigurations.identityTypes.show', compact('identityType'));
    }
}
