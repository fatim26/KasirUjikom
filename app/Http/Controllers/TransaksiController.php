<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\detailtransaksi;
use App\Http\Requests\StoretransaksiRequest;
use App\Http\Requests\UpdatetransaksiRequest;
use Illuminate\Database\QueryException;
use Exception;
use Illuminate\Support\Facades\DB;
use PDOException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoretransaksiRequest $request)
    {
        try{
            DB::beginTransaction();
            $last_id = Transaksi::where('tanggal', date('Y-m-d'))->orderBy('created_at','desc')->select('id')->first();
            $notrans = $last_id === null ? date('Ymd').'0001' : date('Ymd').sprintf('%04d',substr($last_id->id,8,4)+1);
            //dd($notrans);
            $insertransaksi = Transaksi::create([
                'id' => $notrans,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash',
                'keterangan' => ''
            ]);
            if (!$insertransaksi->exists) return 'error';

            // input detail transaksi
            foreach ($request->orderedList as $detail){
                //dd($detail);
                $insertDetailTransaksi = Detailtransaksi::create([
                    'transaksi_id' => $notrans,
                    'menu_id' => $detail['menu_id'],
                    'jumlah' => $detail['qty'],
                    'subtotal' => $detail['harga'] * $detail['qty']

                ]);
            }
            DB::commit();
            return response()->json(['status'=> true,'message'=>'pemesanan berhasil']);
        } catch (Exception | QueryException | PDOException $e){
            return response()->json(['status'=>false,'message'=>'Pemesanan gagal']);
            
        }
    }

    public function faktur($nofaktur){
        try{
            $data = Transaksi::where('id',$nofaktur)->with(['detailTransaksi' => function($query){
                $query -> with('menu');
            }])->first();

            return view('cetak.faktur')->with($data);
        }catch ( Exception | QueryException | PDOException $e){
            return response()->json(['status'=> false,'message'=>'Pemesanan Gagal']);
        }

    }


    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetransaksiRequest $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }

   


}
