<?php

namespace App\Imports;

use App\ReportTransaction;
use Maatwebsite\Excel\Concerns\ToModel;

class ReportTransactionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ReportTransaction([
                'name'     => $row['name'],
                'email'    => $row['email'], 
                'password' => \Hash::make($row['password']),
        ]);
    }
}
