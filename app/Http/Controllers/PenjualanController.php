<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        return view('penjualan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);
        Penjualan::create($request->all());
        return redirect()->route('penjualan.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit(Penjualan $penjualan)
    {
        return view('penjualan.edit', compact('penjualan'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'nama_produk' => 'required',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);
        $penjualan->update($request->all());
        return redirect()->route('penjualan.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success', 'Data berhasil dihapus');
    }
}
