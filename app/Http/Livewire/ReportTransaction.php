<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\ReportTransaction as RT;
use App\Models\Distributor;
use App\Models\Merek;
use App\Exports\ReportTransactionExport;
use Maatwebsite\Excel\Facades\Excel;



class ReportTransaction extends Component
{
    public function render()
    {
        $transaction = RT::orderBy('created_at','desc')->paginate(10);
        return view('livewire.report-transaction', compact('transaction'));
    }

    public function transaction(){
        return view('pos.transaction',compact('transaction'));
    }

    public function laporan($id){
        $transaksi = RT::find($id);
        return view('livewire.detailLaporan',compact('transaksi'));
    }

    public function export() 
    {
        $transaction = RT::orderBy('created_at','desc')->paginate(10);
        dd($transaction);
        return Excel::download(new ReportTransactionExport, 'Report Transaction.xlsx');
    }
}
