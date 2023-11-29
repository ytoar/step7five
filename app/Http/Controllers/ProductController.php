<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showList() {
        $model = new Product();
        $products = $model->getList();
        $companies = $model->getList();
        $sales = $model->getList();

        return view('list', ['products' => $products]);
        return view('list', ['companies' => $companies]);
        return view('list', ['sales' => $sales]);
    }

    public function showRegistForm() {
        return view('regist');
    }

    public function registSubmit(ProductRequest $request) {

        // トランザクション開始
        DB::beginTransaction();
    
        try {
            // 登録処理呼び出し
            $model = new Product();
            $model->registProduct($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        // 処理が完了したらregistにリダイレクト
        return redirect(route('regist'));
    }
}
