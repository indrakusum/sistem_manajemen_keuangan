<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;
use App\Models\Rekening;
use App\Models\rekening as ModelsRekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekening=Rekening::with('nasabah')->get();
        return view('pages.rekening.page-rekening',compact('rekening'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nasabah = Nasabah::all();
        return view('pages.rekening.tambah-rekening', compact('nasabah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Rekening::create($request->all());
        return redirect()->route('rekening.index');
    }

    /**
     * Display the specified resource.



     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rekening=Rekening::findOrFail($id);
        return view('pages.rekening.edit-rekening',compact('rekening'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rekening=Rekening::findOrFail($id);
        $rekening->update($request->all());
        return redirect()->route('rekening.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rekening=Rekening::findOrFail($id);
        $rekening->delete();
        return redirect()->route('rekening.index');
    }
}
