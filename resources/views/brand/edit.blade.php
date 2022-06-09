@extends('layout')
@section('title', 'Güncelle Ekle')

@section('content')
<a href="{{ route('brand.list') }}">Listeye Dön</a>
<h1>Marka Güncelle</h1>

@error('name')
<h3>{{ $message }}</h3>
@enderror

<form method="post" action="{{ route('brand.save',['brand_id' => $brand->id]) }}">
    @csrf
    <input type="text" name="name" placeholder="Marka Adı" value="{{ $brand->name }}" required>
    <button type="submit">Güncelle</button>
</form>

@endsection