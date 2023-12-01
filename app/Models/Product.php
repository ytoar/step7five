<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getList(){
        $products = DB::table('products')->get();
        return $products;
    }

    public function registProduct($data) {
        // 登録処理
        DB::table('product')->insert([
            'title' => $data->title,
            'url' => $data->url,
            'comment' => $data->comment,
        ]);
    }

    public function getUserNameById()
    {
        return DB::table('products')
                ->join('products', 'product', '=', 'company')
                ->get();
    }
}