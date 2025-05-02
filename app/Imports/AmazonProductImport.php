<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class AmazonProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dd($row);

        $product = new Product([
            'name' => $row['title'],
            'tags' => $row['tags'],
            'price' => $row['price'],
            'description' => $row['description'],
            'image_path' => $row['thumbnail'],
            'stock_quantity' => $row['stock'],
        ]);

        $product->setRelation('category', new Team(['name' => $row[1]]));

        return $product;
    }
}
