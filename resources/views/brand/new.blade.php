@extends('layout')
@section('title', 'Marka Ekle')

@section('content')
<a href="{{ route('brand.list') }}">Listeye Dön</a>
<h1>Marka Ekle</h1>

@error('name')
<h3>{{ $message }}</h3>
@enderror

<form method="post" action="{{ route('brand.create') }}">
    @csrf
    <input type="text" name="name" placeholder="Marka Adı" required>
    <button type="submit">Ekle</button>
</form>

@endsection