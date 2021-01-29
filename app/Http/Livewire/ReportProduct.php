<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Livewire\WithPagination;
// use DB;
// use Haruncpi\LaravelIdGenerator\IdGenerator;

use App\Exports\ReportProductExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class ReportProduct extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        // $product = Product::;
        // $products = Product::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at', 'DESC');
        $products = Product::orderBy('created_at', 'DESC')->paginate(20);
        return view('livewire.report-product',compact('products'));
    }

    public function export() 
    {
        return Excel::download(new ReportProductExport, 'Report Product.xlsx');
    }
}
