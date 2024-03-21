<?php

namespace App\Http\Controllers;

use App\Models\stok;
use App\Http\Requests\StorestokRequest;
use App\Http\Requests\UpdatestokRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use PDOException;
class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['stok'] = Stok::orderBy('created_at','ASC')->get();

        return view('stok.index')->with($data);
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
    public function store(StorestokRequest $request)
    {
        // dd($request->all());
        try{
            DB::beginTransaction();
            Stok::create($request->all());
            DB::commit();
            return redirect('stok')->with('success','Data berhasil ditambah');  
        }catch (QueryException | Exception | PDOException){
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestokRequest $request, stok $stok)
    {
        $stok->update($request->all());
        return redirect('stok')->with('success','Data berhasil!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(stok $stok)
    {
        $stok->delete();
        return redirect('/stok')->with('success','Data berhasil dihapus');
    }
    
}
