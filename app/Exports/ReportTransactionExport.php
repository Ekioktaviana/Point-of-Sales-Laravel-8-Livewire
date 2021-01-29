<?php

namespace App\Exports;

use App\ReportTransaction;
use App\Models\ReportTransaction as RT;
// use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportTransactionExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return RT::selectRaw(
        //     'invoice_number','username','name','price','qty','pay','total',
        // )->get();

        return RT::all();
    }

    public function headings(): array
    {
        return [
            'Id Product Transaction',
            'Id Product',
            'Invoice Number',
            'Qty',
            'Created at',
            'Updated at',
            'User ID',
            'Total Bayar',
            'Total Harga',
            'Admin',
            'Email',
            'Password',
            'Product Name',
            'Image',
            'Description',
            'Harga Barang',
            'Harga Beli',
            'Tanggal Masuk',
            'Kembalian',
        ];
    }
}
