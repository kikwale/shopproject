<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductsImport implements ToModel,WithStartRow
{

       /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
        'name' => $row[0],
        'owner_id' => $row[1],
        'shop_id'  => $row[2],
        'category' => $row[3],
        'unit' => $row[4],
        'quantity' => $row[5],
        'money_unit' => $row[6],
        'total' => $row[7],
        'notification' => $row[8],
        'purchased_price' => $row[9],
        'sold_price' => $row[10],
        // 'expire' => $row[11],
        'location' => $row[12],
        'description' => $row[13],
        ]);
    }
}
