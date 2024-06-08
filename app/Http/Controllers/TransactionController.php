<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{
    public function index()
    {
        $data = transaction::all();
        return view('transaction.index', compact('data'));
    }

    public function create()
    {
        return view('transaction.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_baju' => 'required',
            'harga' => 'required',
            'tanggal' => 'required',
        ]);

        $data = transaction::create([
            'nama' => $request->nama,
            'jenis_baju' => $request->jenis_baju,
            'harga' => $request->harga,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('transaction.index')->with('success', 'Transaction created successfully.');
    }

    public function edit($id)
    {
        $data = transaction::findOrFail($id);
        return view('transaction.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = transaction::find($id);

        $request->validate([
            'nama' => 'required',
            'jenis_baju' => 'required',
            'harga' => 'required',
            'tanggal' => 'required',
        ]);

        $data -> update([
            'nama' => $request->nama,
            'jenis_baju' => $request->jenis_baju,
            'harga' => $request->harga,
            'tanggal' => $request->tanggal,
        ]);
        return redirect()->route('transaction.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy($id)
    {
        $data = transaction::findOrFail($id);
        $data->delete();

        return redirect()->route('transaction.index')->with('success', 'Transaction deleted successfully.');
    }

    public function print(){
        $data = transaction::all();
        $PDF = PDF::loadView('transaction/print', array ('data' => $data));
        return $PDF->stream('data-transaksi.pdf');
    }
    
}