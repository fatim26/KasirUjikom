<?php

namespace App\Http\Controllers;

use App\Models\jenis;
use App\Http\Requests\StorejenisRequest;
use App\Http\Requests\UpdatejenisRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use PDOException;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['jenis'] = Jenis::orderBy('created_at','ASC')->get();

        return view('jenis.index')->with($data);
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
    public function store(StorejenisRequest $request)
    {
        // dd($request->all());
        try{
            DB::beginTransaction();
            Jenis::create($request->all());
            DB::commit();
            return redirect('jenis')->with('success','Data berhasil ditambah');  
        }catch (QueryException | Exception | PDOException){
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejenisRequest $request, jenis $jeni)
    {
        $jeni->update($request->all());
        return redirect('jenis')->with('success','Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jenis $jenis)
    {
        $jenis->delete();
        return redirect('/jenis')->with('success','Data berhasil dihapus');
    }
}
