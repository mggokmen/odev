@extends('layout')
@section('title', 'Ürün Ekle')

@section('content')
<a href="{{ route('product.list',['brand_id'=>$brand_id]) }}">Listeye Dön</a>
<h1>Ürün Ekle</h1>

@error('name')
<h3>{{ $message }}</h3>
@enderror

<form method="post" action="{{ route('product.create') }}">
    @csrf
    <input type="text" name="name" placeholder="Ürün Adı" required>
    <input type="hidden" name="brand_id" value="{{ $brand_id }}">
    <button type="submit">Ekle</button>
</form>

@endsection