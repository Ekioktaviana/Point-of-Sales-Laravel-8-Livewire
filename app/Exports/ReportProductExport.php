<?php

namespace App\Exports;

use App\ReportProduct;
use App\Models\Product as RP;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RP::all();
    }

    public function headings(): array
    {
        return [
            'Id Product',
            'Product Name',
            'Image',
            'Description',
            'Qty',
            'Harga Barang',
            'Harga Beli',
            'Tanggal Masuk',
            'Created at',
            'Updated at',
        ];
    }
}
