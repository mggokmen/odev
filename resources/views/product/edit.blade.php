@extends('layout')
@section('title', 'Ürün Düzenle')

@section('content')
<a href="{{ route('product.list',[ 'brand_id' => $product->brand_id ]) }}">Listeye Dön</a>
<h1>Ürün Düzenle</h1>

@error('name')
<h3>{{ $message }}</h3>
@enderror

<form method="post" action="{{ route('product.save') }}">
    @csrf
    <input type="text" name="name" placeholder="Ürün Adı" value="{{ $product->name }}" required>
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit">Ekle</button>
</form>

@endsection