@extends('layouts.app')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <div class="container">
        <div class="product">
            <img src="{{ asset($product->image) }}" alt="" class="product-img">
            <div class="product__content-header text-center">
                <div class="product__name">
                    {{ $product->name }}
                </div>
                <div class="product__price">
                    ¥ {{ number_format($product->price) }}
                </div>
            </div>
            {{ $product->description }}

            <form action="{{ route('line_item.create')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <div class="product__quantity d-flex justify-content-around">
                    <label for="quantity">個数</label>
                    <input type="number" name="quantity" id="quantity" min="1" value="1" required style="width: 50%">
                </div>
                <div class="product__btn-add-cart">
                    <button type="submit" class="btn btn-outline-secondary btn-block">
                        カートに追加する
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
