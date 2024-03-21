<?php

namespace App\Http\Controllers;

use App\Models\pelanggan;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use PDOException;
class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pelanggan'] = Pelanggan::orderBy('created_at','ASC')->get();

        return view('pelanggan.index')->with($data);
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
    public function store(StorepelangganRequest $request)
    {
         // dd($request->all());
         try{
            DB::beginTransaction();
            Pelanggan::create($request->all());
            DB::commit();
            return redirect('pelanggan')->with('success','Data berhasil ditambah');  
        }catch (QueryException | Exception | PDOException){
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepelangganRequest $request, pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());
        return redirect('pelanggan')->with('success','Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect('/pelanggan')->with('success','Data berhasil dihapus');
    }
}
