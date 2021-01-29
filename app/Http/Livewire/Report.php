<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use DB;


use App\Models\Product as ProductModel;
use App\Models\Transaction;
use App\Models\ProductTransaction;
use App\Models\Distributor;
use App\Models\Merek;


class Report extends Component
{
    public function render()
    {
        return view('livewire.report');
    }
}
