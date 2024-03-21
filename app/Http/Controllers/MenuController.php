<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Http\Requests\StoremenuRequest;
use App\Http\Requests\UpdatemenuRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use PDOException;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['menu'] = Menu::orderBy('created_at','ASC')->get();

        return view('menu.index')->with($data);
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
    public function store(StoremenuRequest $request)
    {
        // dd($request->all());
        try{
            DB::beginTransaction();
            Menu::create($request->all());
            DB::commit();
            return redirect('menu')->with('success','Data berhasil ditambah');  
        }catch (QueryException | Exception | PDOException){
            DB::rollBack();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemenuRequest $request, menu $menu)
    {
        $menu->update($request->all());
        return redirect('menu')->with('success','Data berhasil!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menu $menu)
    {
        $menu->delete();
        return redirect('/menu')->with('success','Data berhasil dihapus');
    }
}
