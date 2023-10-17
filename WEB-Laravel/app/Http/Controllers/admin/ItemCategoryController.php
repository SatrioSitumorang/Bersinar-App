<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ItemCategoryController extends Controller
{
    public function index(): View
    {
        $itemcategories = DB::table('itemCategory')
            ->join('itemtype', 'itemcategory.itemTypeId', '=', 'itemtype.itemTypeId')
            ->select('itemcategory.*', 'itemtype.itemType')
            ->get();

        return view('admin.DataMaster.itemCategory.index', ['itemcategories' => $itemcategories]);
    }

    public function create()
    {
        $jenisBarang = DB::table('itemType')->get(); // Ambil data dari tabel "Jenis Barang"

        return view('admin.DataMaster.itemCategory.create', ['jenisBarang' => $jenisBarang]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_barang' => 'required', // Pastikan jenis barang dipilih
            'kategori_barang' => 'required',
            'keterangan' => 'required',
        ]);

        DB::table('itemCategory')->insert([
            'itemTypeId' => $request->input('jenis_barang'), // Pastikan ini adalah ID jenis barang yang valid
            'itemCategoryName' => $request->input('kategori_barang'),
            'description' => $request->input('keterangan'),
        ]);

        return redirect()->route('itemCategory.index')->with('success', 'Kategori Barang berhasil ditambahkan.');
    }

    public function edit($id): View
    {
        $itemcategory = DB::table('itemCategory')
            ->join('itemtype', 'itemcategory.itemTypeId', '=', 'itemtype.itemTypeId')
            ->select('itemcategory.*', 'itemtype.itemType')
            ->where('itemcategory.itemCategoryId', $id)
            ->first();

        if (!$itemcategory) {
            return redirect()->route('itemCategory.index')->with('error', 'Kategori Barang tidak ditemukan.');
        }

        $itemtypes = DB::table('itemType')->get(); // Pastikan Anda mengambil data 'itemtype' di sini.

        return view('admin.DataMaster.itemCategory.edit', compact('itemcategory', 'itemtypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_barang' => 'required',
            'keterangan' => 'required',
        ]);

        DB::table('itemCategory')->where('itemCategoryId', $id)->update([
            'itemCategoryName' => $request->input('kategori_barang'),
            'itemTypeId' => $request->input('jenis_barang'), // Pastikan ini sesuai dengan jenis barang yang dipilih
            'description' => $request->input('keterangan'),
        ]);

        return redirect()->route('itemCategory.index')->with('success', 'Kategori Barang berhasil diupdate.');
    }

    public function show($id): View
    {
        $itemcategory = DB::table('itemCategory')
            ->join('itemtype', 'itemcategory.itemTypeId', '=', 'itemtype.itemTypeId')
            ->select('itemcategory.*', 'itemtype.itemType')
            ->where('itemcategory.itemCategoryId', $id)
            ->first();

        if (!$itemcategory) {
            return redirect()->route('itemCategory.index')->with('error', 'Kategori Barang tidak ditemukan.');
        }

        return view('admin.DataMaster.itemCategory.show', compact('itemcategory'));
    }

    public function hapus($id)
    {
        $itemcategory = DB::table('itemCategory')->where('itemCategoryId', $id)->first();

        if (!$itemcategory) {
            return redirect()->route('itemCategory.index')->with('error', 'Kategori Barang tidak ditemukan.');
        }
        $deleted = DB::table('itemCategory')->where('itemCategoryId', $id)->delete();

        if ($deleted) {
            return redirect()->route('itemCategory.index')->with('success', 'Kategori Barang berhasil dihapus.');
        } else {
            return redirect()->route('itemCategory.index')->with('error', 'Gagal menghapus Kategori Barang.');
        }
    }
}
