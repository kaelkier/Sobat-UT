<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function index()
    {
        $instansis = Instansi::all();
        return view('instansi.index', compact('instansis'));
    }

    public function create()
    {
        return view('instansi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email',
            'provinsi' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'pic' => 'nullable|string',
            'status' => 'nullable|string',
            'bintang' => 'nullable|integer|min:0|max:5',
        ]);

        Instansi::create($request->all());

        return redirect()->back()->with('success', 'Instansi created successfully.');
    }

    public function edit($id)
    {
        $instansi = Instansi::findOrFail($id);
        return view('instansi.edit', compact('instansi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'nullable|email',
            'provinsi' => 'nullable|string',
            'kabupaten' => 'nullable|string',
            'pic' => 'nullable|string',
            'status' => 'nullable|string',
            'bintang' => 'nullable|integer|min:0|max:5',
        ]);

        $instansi = Instansi::findOrFail($id);
        $instansi->update($request->all());

        return redirect()->back()->with('success', 'Instansi updated successfully.');
    }

    public function destroy($id)
    {
        $instansi = Instansi::findOrFail($id);
        $instansi->delete();

        return redirect()->back()->with('success', 'Instansi deleted successfully.');
    }
}
