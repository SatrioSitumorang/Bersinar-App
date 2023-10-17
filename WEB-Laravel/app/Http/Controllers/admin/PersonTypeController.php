<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonTypeController extends Controller
{
    public function index()
    {
        $personType = DB::table('personType')->get();
        return view('admin.SettingsAndConfigurations.personType.index', ['personType' => $personType]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'personType' => 'required',
                'description' => 'required',
            ]);

            $personType = DB::table('personType')->insertGetId([
                'personType' => $request->input('personType'),
                'description' => $request->input('description')
            ]);

            $newpersonType = DB::table('personType')->where('personTypeId', $personType)->first();

            return response()->json($newpersonType);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Jenis Orang gagal ditambahkan']);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'personType' => 'required',
                'description' => 'required',
            ]);

            DB::table('personType')
                ->where('personTypeId', $id)
                ->update([
                    'personType' => $request->input('personType'),
                    'description' => $request->input('description')
                ]);

            return response()->json(['message' => 'Jenis Orang telah diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Jenis Orang gagal diperbarui']);
        }
    }

    public function edit($id)
    {
        $personType = DB::table('personType')->where('personTypeId', $id)->first();
        return response()->json($personType);
    }


    public function show($id)
    {
        $personType = DB::table('personType')->where('personTypeId', $id)->first();
        return response()->json([
            'personType' => $personType->personType,
            'description' => $personType->description,
        ]);
    }

    public function delete($id)
    {
        try {
            DB::table('personType')->where('personTypeId', $id)->delete();
            return redirect()->route('personType.index')->with('success', 'Jenis Orang berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('personType.index')->with('error', 'Jenis Orang gagal dihapus.');
        }
    }
}
