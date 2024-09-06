<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nasabah;
use App\Models\Simpanan;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index(){
        // $simpanan = Simpanan::all();
        // return view('pages.simpanan.simpanan',compact('simpanan'));

        $simpanan=Simpanan::with('nasabah')->get();
        return view('pages.simpanan.simpanan',compact('simpanan'));
    }

    public function create(){
        $nasabah=Nasabah::all();
        return view('pages.simpanan.tambah-simpanan',compact('nasabah'));
    }

    public function store(Request $request){
        Simpanan:: create($request->all());
        return redirect()->route('simpanan.index');


    }

    public function edit($id){
        $nasabah=Nasabah::all();
        $simpanan = Simpanan::findOrFail($id);
        return view('pages.simpanan.edit-simpanan',compact('simpanan'));

    }

    public function update(Request $request,$id){
        $simpanan =Simpanan::findOrFail($id);
        $simpanan->update($request->all());
        return redirect()->route('simpanan.index');

    }

    public function destroy($id){
        $simpanan = Simpanan::findOrFail($id);
        $simpanan-> delete();
        return redirect()->route('simpanan.index');
    }
}
