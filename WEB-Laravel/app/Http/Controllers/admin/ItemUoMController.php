<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ItemUoMController extends Controller
{
    public function index(): View
    {
        // API pertama (uomTypeId)
        $response1 = Http::get(Config('app.api_url') . 'uomType/viewAll');
        $uomTypes = $response1->json();

        // API kedua (itemUoM)
        $response2 = Http::get(Config('app.api_url') . 'itemUoM/viewAll');
        $itemUoM = $response2->json();

        // Gabungkan data berdasarkan kolom yang sama (uomTypeId)
        $mergedData = [];
        foreach ($uomTypes['data'] as $uomType) {
            $uomTypeId = $uomType['uomTypeId'];
            foreach ($itemUoM['data'] as $itemuom) {
                if ($itemuom['uomTypeId'] == $uomTypeId) {
                    // Gabungkan data sesuai kebutuhan
                    $mergedData[] = [
                        'uomType' => $uomType['uomType'],
                        'itemUoM' => $itemuom['uomItem'],
                        'itemUoM' => $itemuom['description'],
                    ];
                }
            }
        }

        return view('admin.DataMaster.itemUoM.index', compact('mergedData'));
    }




    public function create()
    {
        $response = Http::get(Config('app.api_url') . 'uomType/viewAll');
        $uomType = $response->json();

        return view('admin.DataMaster.itemUoM.create', compact('uomType'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'uomItem' => 'required',
            'description' => 'required',
        ]);

        $response = Http::post(Config('app.api_url') . 'itemUoM/insert', [
            'uomItem' => $request->input('uomItem'),
            'description' => $request->input('description'),
        ]);

        if ($response->status() == 201) {
            // Jika status respons adalah 201 (Created), berarti data berhasil ditambahkan
            return redirect()->route('itemUoM.index')->with('success', 'Satuan Barang berhasil ditambahkan.');
        } else {
            // Jika status respons adalah selain 201, berarti ada kesalahan
            return redirect()->route('itemUoM.index')->with('error', 'Gagal menambahkan Satuan Barang.');
        }
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'uomItem' => 'required',
    //         'description' => 'required',
    //     ]);

    //     $response = Http::post(Config('app.api_url') . 'itemUoM/insert', [
    //         'uomItem' => $request->input('uomItem'),
    //         'description' => $request->input('description'),
    //     ]);

    //     if ($response->successful()) {
    //         // Jika request berhasil, redirect dengan pesan sukses
    //         return redirect()->route('itemUoM.index')->with('success', 'Satuan Barang berhasil ditambahkan.');
    //     } else {
    //         // Jika request gagal, redirect dengan pesan error
    //         return redirect()->route('itemUoM.index')->with('error', 'Gagal menambahkan Satuan Barang.');
    //     }
    // }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'uomItem' => 'required',
    //         'description' => 'required',
    //     ]);
    //     $response = Http::post(Config('app.api_url') . 'itemUoM/insert', [
    //         'uomItem' => $request->input('uomItem'),
    //         'description' => $request->input('description'),
    //     ]);
    //     return redirect()->route('itemUoM.index')->with('success', 'Satuan Barang berhasil ditambahkan');
    //     if ($response->successful()) {
    //         return response()->json(['message' => 'Satuan Barang berhasil ditambahkan.'], 200);
    //     } else {
    //         return response()->json(['message' => 'Gagal menambahkan Satuan Barang.'], 400);
    //     }
    //     // $request->validate([
    //     //     'jenis_satuan' => 'required', // Pastikan jenis barang dipilih
    //     //     'satuan_barang' => 'required',
    //     //     'keterangan' => 'required',
    //     // ]);

    //     // DB::table('itemUoM')->insert([
    //     //     'uomTypeId' => $request->input('jenis_satuan'), // Pastikan ini adalah ID jenis barang yang valid
    //     //     'uomItem' => $request->input('satuan_barang'),
    //     //     'description' => $request->input('keterangan'),
    //     // ]);

    //     // return redirect()->route('itemUoM.index')->with('success', 'Satuan Barang berhasil ditambahkan.');
    // }

    public function edit($id): View
    {
        $itemuom = DB::table('itemUoM')
            ->join('uomType', 'itemUoM.uomTypeId', '=', 'uomType.uomTypeId')
            ->select('itemUoM.*', 'uomType.uomType')
            ->where('itemUoM.itemUoMId', $id)
            ->first();

        if (!$itemuom) {
            return redirect()->route('itemUoM.index')->with('error', 'Satuan Barang tidak ditemukan.');
        }

        $uomtypes = DB::table('uomType')->get(); // Ambil data 'uomtype'.

        return view('admin.DataMaster.itemUoM.edit', compact('itemUoM', 'uomtypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_satuan' => 'required',
            'satuan_barang' => 'required',
            'keterangan' => 'required',
        ]);

        DB::table('itemUoM')->where('itemUoMId', $id)->update([
            'uomTypeId' => $request->input('jenis_satuan'),
            'uomItem' => $request->input('satuan_barang'),
            'description' => $request->input('keterangan'),
        ]);

        return redirect()->route('itemUoM.index')->with('success', 'Satuan Barang berhasil diupdate.');
    }

    public function show($id): View
    {
        $itemuom = DB::table('itemUoM')
            ->join('uomType', 'itemuom.uomTypeId', '=', 'uomType.uomTypeId')
            ->select('itemUoM.*', 'uomType.uomType')
            ->where('itemUoM.itemUoMId', $id) // Perhatikan bahwa kita menggunakan 'itemUoMId' pada tabel 'itemuom'
            ->first();

        if (!$itemuom) {
            return redirect()->route('itemUoM.index')->with('error', 'Satuan Barang tidak ditemukan.');
        }

        return view('admin.DataMaster.itemUoM.show', compact('itemuom'));
    }

    public function hapus($id)
    {
        $itemuom = DB::table('itemUoM')->where('itemUoMId', $id)->first();

        if (!$itemuom) {
            return redirect()->route('itemUoM.index')->with('error', 'Satuan Barang tidak ditemukan.');
        }
        $deleted = DB::table('itemUoM')->where('itemUoMId', $id)->delete();
        if ($deleted) {
            return redirect()->route('itemUoM.index')->with('success', 'Satuan Barang berhasil dihapus.');
        } else {
            return redirect()->route('itemUoM.index')->with('error', 'Gagal menghapus Satuan Barang.');
        }
    }
}
