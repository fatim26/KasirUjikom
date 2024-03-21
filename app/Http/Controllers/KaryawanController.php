<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Http\Requests\StorekaryawanRequest;
use App\Http\Requests\UpdatekaryawanRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use PDOException;
class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['karyawan'] = Karyawan::orderBy('created_at','ASC')->get();

        return view('karyawan.index')->with($data);
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
    public function store(StorekaryawanRequest $request)
    {
        // dd($request->all());
        try{
            DB::beginTransaction();
            Karyawan::create($request->all());
            DB::commit();
            return redirect('karyawan')->with('success','Data berhasil ditambah');  
        }catch (QueryException | Exception | PDOException){
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekaryawanRequest $request, karyawan $karyawan)
    {
        $karyawan->update($request->all());
        return redirect('karyawan')->with('success','Data berhasil!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect('/karyawan')->with('success','Data berhasil dihapus');
    }
}
