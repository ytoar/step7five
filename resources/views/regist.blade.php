@extends('layouts.app')

@section('content')
    <div class="container">
    <button onclick="location.href='{{ route('list') }}'" class="btn btn-warning">戻る</button>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div>
                    <h1>新規登録</h1>
                </div>
                <form action="{{ route('registSubmit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="regist-form">
                        <div id="id-area">
                            <label for="" class="form-label">id</label>
                            
                        </div>
                        <div id="name-area">
                            <label for="" class="form-label">商品名</label>
                            <input type="text" name="product_name" value="{{ $companies }}">
                            
                        </div>
                        <div id="company-area">
                            <label for="" class="form-label">メーカー</label>
                            
                        </div>
                        <div id="price-area">
                            <label for="" class="form-label">価格</label>
                            <input type="text" name="price" value="{{ $companies }}">
                            
                        </div>
                        <div id="stock-area">
                            <label for="" class="form-label">在庫</label>
                            <input type="text" name="stock" value="{{ $companies }}">
                            
                        </div>
                        <div id="comment-area">
                            <label for="" class="form-label">コメント</label>
                            <textarea name="comment" id="" cols="30" rows="2">{{ $companies }}</textarea>
                            
                        </div>
                        <div id="old-img-area">
                            <img src="{{ asset('$companies->img_path') }}" alt="商品画像" class="img_view">
                        </div>
                        <div id="img-area">
                            <label for="" class="form-label">画像</label>
                            <input type="file" name="img_path">
                        </div>

                        <input type="submit" value="登録" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection