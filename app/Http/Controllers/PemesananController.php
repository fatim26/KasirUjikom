<?php

namespace App\Http\Controllers;

use App\Models\pemesanan;
use App\Http\Requests\StorepemesananRequest;
use App\Http\Requests\UpdatepemesananRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use PDOException;
use App\Models\jenis;


class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= jenis ::with(['menu'])->get();
        return view('pemesanan.index',[
            'jenis' => $data
        ]);
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
    public function store(StorepemesananRequest $request)
    {
        // dd($request->all());
        try{
            DB::beginTransaction();
            Pemesanan::create($request->all());
            DB::commit();
            return redirect('pemesanan')->with('success','Data berhasil ditambah');  
        }catch (QueryException | Exception | PDOException){
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepemesananRequest $request, pemesanan $pemesanan)
    {
        try {
            DB::beginTransaction();
            $pemesanan = pemesanan::findOrFail($pemesanan);
            $validate = $request->validated();
            $pemesanan->update($validate);
            DB::commit();
            return redirect()->back()->with('success', 'data berhasil di ubah');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['message' => 'terjadi kesalahan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pemesanan $pemesanan)
    {
        try {
            $pemesanan->delete();
            return redirect('/pemesanan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
