<?php

namespace App\Http\Controllers;

use App\Models\produktitipan;
use App\Http\Requests\StoreproduktitipanRequest;
use App\Http\Requests\UpdateproduktitipanRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use PDOException;
class ProduktitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['produktitipan'] = Produktitipan::orderBy('created_at','ASC')->get();

        return view('produktitipan.index')->with($data);
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
    public function store(StoreproduktitipanRequest $request)
    {
        // dd($request->all());
        try{
            DB::beginTransaction();
            Produktitipan::create($request->all());
            DB::commit();
            return redirect('produktitipan')->with('success','Data berhasil ditambah');  
        }catch (QueryException | Exception | PDOException){
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(produktitipan $produktitipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produktitipan $produktitipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproduktitipanRequest $request, produktitipan $produktitipan)
    {
        $produktitipan->update($request->all());
        return redirect('produktitipan')->with('success','Data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produktitipan $produktitipan)
    {
        $produktitipan->delete();
        return redirect('/produktitipan')->with('success','Data berhasil dihapus');
    }
}
