<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReligionController extends Controller
{
    public function index()
    {
        $religions = DB::table('religion')->get();
        return view('admin.SettingsAndConfigurations.religion.index', ['religions' => $religions]);
    }

    public function create()
    {
        return view('admin.SettingsAndConfigurations.religion.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'religionName' => 'required',
                'description' => 'required',
            ]);

            $religion = DB::table('religion')->insertGetId([
                'religionName' => $request->input('religionName'),
                'description' => $request->input('description')
            ]);

            $newReligion = DB::table('religion')->where('religionId', $religion)->first();

            return response()->json($newReligion);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Agama gagal ditambahkan']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'religionName' => 'required',
                'description' => 'required',
            ]);

            DB::table('religion')
                ->where('religionId', $id)
                ->update([
                    'religionName' => $request->input('religionName'),
                    'description' => $request->input('description')
                ]);

            return response()->json(['message' => 'Agama telah diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Agama gagal diperbarui']);
        }
    }

    public function edit($id)
    {
        $agama = DB::table('religion')->where('religionId', $id)->first();
        return response()->json($agama);
    }

    public function show($id)
    {
        $agama = DB::table('religion')->where('religionId', $id)->first();
        return response()->json([
            'religionName' => $agama->religionName,
            'description' => $agama->description,
        ]);
    }

    public function hapus($id)
    {
        try {
            DB::table('religion')->where('religionId', $id)->delete();
            return redirect()->route('religion.index')->with('success', 'Agama berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('religion.index')->with('error', 'Agama gagal dihapus.');
        }
    }
}
