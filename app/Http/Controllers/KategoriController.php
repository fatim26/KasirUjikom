<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use PDOException;
class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['kategori'] = Kategori::orderBy('created_at','ASC')->get();

        return view('kategori.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorekategoriRequest $request)
    {
         // dd($request->all());
         try{
            DB::beginTransaction();
            Kategori::create($request->all());
            DB::commit();
            return redirect('kategori')->with('success','Data berhasil ditambah');  
        }catch (QueryException | Exception | PDOException){
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekategoriRequest $request, kategori $kategori)
    {
        $kategori->update($request->all());
        return redirect('kategori')->with('success','Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        $kategori->delete();
        return redirect('/kategori')->with('success','Data berhasil dihapus');
    }
}
