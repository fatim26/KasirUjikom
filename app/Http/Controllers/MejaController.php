<?php

namespace App\Http\Controllers;

use App\Models\meja;
use App\Http\Requests\StoremejaRequest;
use App\Http\Requests\UpdatemejaRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use PDOException;
class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['meja'] = Meja::orderBy('created_at','ASC')->get();

        return view('meja.index')->with($data);
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
    public function store(StoremejaRequest $request)
    {
        // dd($request->all());
        try{
            DB::beginTransaction();
            Meja::create($request->all());
            DB::commit();
            return redirect('meja')->with('success','Data berhasil ditambah');  
        }catch (QueryException | Exception | PDOException){
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemejaRequest $request, meja $meja)
    {
        $meja->update($request->all());
        return redirect('meja')->with('success','Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(meja $meja)
    {
        $meja->delete();
        return redirect('/meja')->with('success','Data berhasil dihapus');
    }
}
