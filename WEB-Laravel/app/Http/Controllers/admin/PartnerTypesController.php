<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class PartnerTypesController extends Controller
{
    public function index()
    {
        $partnertypes = DB::table('partnerType as child')
            ->leftJoin('partnerType as parent', 'child.parentId', '=', 'parent.partnerTypeId')
            ->select('child.partnerTypeId', 'child.partnerType', 'child.description', 'parent.partnerType as parent_name')
            ->get();

        return view('admin.SettingsAndConfigurations.partnerTypes.index', ['partnertypes' => $partnertypes]);
    }


    public function create()
    {
        $parents = DB::table('partnerType')->get();
        return view('admin.SettingsAndConfigurations.partnerTypes.create', ['parents' => $parents]);
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan

        // Get the selected parent name from the request
        $parentName = $request->input('parent_id');

        // Find the parent by partnerType
        $parent = DB::table('partnerType')->where('partnerType', $parentName)->first();

        // Use the found parent's partnerTypeId as parentId
        $parentId = $parent ? $parent->partnerTypeId : null;

        // Simpan data ke database
        DB::table('partnerType')->insert([
            'parentId' => $parentId,
            'partnerType' => $request->input('jenis_partner'),
            'description' => $request->input('keterangan'),
            // ... tambahkan kolom lainnya sesuai kebutuhan
        ]);

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('partnerTypes.index')->with('success', 'Data jenis partner berhasil ditambahkan.');
    }
    public function show($id): View
    {
        $partnerType = DB::table('partnerType')
            ->select('partnerType', 'description', 'parentId') // Menggunakan 'parentId' untuk mengambil parent_id
            ->where('partnerTypeId', $id)
            ->first();

        if (!$partnerType) {
            return redirect()->route('partnerTypes.index')->with('error', 'Data jenis partner tidak ditemukan.');
        }

        // Jika Anda ingin menampilkan informasi parent, tambahkan kode berikut:
        $parentType = DB::table('partnerType')
            ->select('partnerType')
            ->where('partnerTypeId', $partnerType->parentId) // Menggunakan 'parentId' untuk mencocokkan parent_id
            ->first();

        return view('admin.SettingsAndConfigurations.partnerTypes.show', compact('partnerType', 'parentType'));
    }
    public function hapus($id)
    {
        try {
            DB::table('partnerType')->where('partnerTypeId', $id)->delete();
            return redirect()->route('partnerTypes.index')->with('success', 'Data jenis partner berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('partnerTypes.index')->with('error', 'Data jenis partner gagal dihapus');
        }
    }
}
