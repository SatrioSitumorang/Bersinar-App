<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ItemTypeController extends Controller
{
    public function index(): View
    {
        $response = Http::get(Config('app.api_url') . 'itemType/viewAll');
        $itemType = $response->json();
        return view('admin.DataMaster.itemType.index', compact('itemType'));
    }


    public function create(): View
    {
        return view('admin.DataMaster.itemType.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'itemType' => 'required',
            'description' => 'required',
        ]);
        $response = Http::post(Config('app.api_url') . 'itemType/insert', [
            'itemType' => $request->input('itemType'),
            'description' => $request->input('description'),
        ]);
        return redirect()->route('itemType.index')->with('success', 'Jenis Barang berhasil ditambahkan');
        if ($response->successful()) {
            return response()->json(['message' => 'Jenis Barang berhasil ditambahkan.'], 200);
        } else {
            return response()->json(['message' => 'Gagal menambahkan Jenis Barang.'], 400);
        }
        return redirect()->route('itemType.index')->with('success', 'Jenis Barang berhasil ditambahkan.');
    }

    public function show($id): View
    {
        $response = Http::get(Config('app.api_url') . 'itemType/viewById?id=' . $id);
        if ($response->successful()) {
            $itemType = $response->json()['data'];
            return view('admin.DataMaster.itemType.show', compact('itemType'));
        } else {
            return redirect()->route('itemType.index')->with('error', 'Jenis Barang tidak ditemukan.');
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $response = Http::put(config('app.api_url') . 'itemType/update', [
                'itemTypeId' => (int)$id,
                'itemType' => $request->input('itemType'),
                'description' => $request->input('description'),
            ]);
            if ($response->successful()) {
                return redirect()->route('itemType.index')->with('success', 'Jenis Barang berhasil diupdate.');
            } else {
                return back()->withErrors('Gagal mengupdate Jenis Barang.')->withInput();
            }
        } catch (\Exception $e) {
            return back()->withErrors('Terjadi kesalahan saat memperbarui Jenis Barang.')->withInput();
        }
    }

    public function edit($id): View
    {
        $response = Http::get(Config('app.api_url') . 'itemType/viewById?id=' . $id);
        $temp = $response->json();
        $itemTypeData = $temp['data'];
        return view('admin.DataMaster.itemType.edit', compact('itemTypeData'));
    }

    public function hapus($id)
    {
        // try {
        $response = Http::delete(config('app.api_url') . 'itemType/deleteById?id=' . $id);
        if ($response->successful()) {
            return redirect()->route('itemType.index')->with('success', 'Jenis Barang berhasil dihapus');
        } else {
            return redirect()->route('itemType.index')->with('error', 'Jenis Barang gagal dihapus');
        }
        // } catch (\Exception $e) {
        //     return redirect()->route('uomType.index')->with('error', 'Jenis Satuan Barang gagal dihapus');
        // }
    }
}
