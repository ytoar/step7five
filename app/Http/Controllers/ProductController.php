<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Company;

class ProductController extends Controller
{
    public function showList() {
        $model = new Product();
        $products = $model->getList();
        $company_model = new Company();
        $companies = $company_model->getList();

        return view('product', ['products' => $products, 'companies' => $companies]);
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
