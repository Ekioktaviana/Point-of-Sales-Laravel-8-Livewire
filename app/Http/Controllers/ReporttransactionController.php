<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ReportTransactionExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;


use App\Models\Product;
use App\Models\Transaction;
use App\Models\ReportTransaction as RT;
use App\Models\Distributor;
use App\Models\Merek;

class ReporttransactionController extends Controller
{
    public function render()
    {
        $transaction = RT::orderBy('created_at','desc')->paginate(10);
        return view('livewire.report-transaction', compact('transaction'));
    }

    public function laporan(){
        $history = RT::orderBy('created_at','desc')->paginate(10);
        return view('livewire.report-transaction',compact('history'));
    }

    public function laporanTransaksi($id){
        $transaksi = RT::all();

        dd($transaksi);
        return view('livewire.detailLaporan',compact('transaksi'));
    }

    
    public function export() 
    {
        // $transaksi = RT::all();

        // dd($transaksi);
        return Excel::download(new ReportTransactionExport, 'Report Transaction.xlsx');
    }


}
