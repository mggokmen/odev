@extends('layout')
@section('title', 'Marka Ürünleri Listesi')

@section('content')

<a href="{{ route('brand.list') }}">Markalar</a>
<span> - </span>
<a href="{{ route('product.new',[ 'brand_id' => $brand_id ]) }}">Ürün Ekle</a>
<hr>

<table width="100%" border=1>
    @if($products?->count())
    <tr>
        <td>Ürün</td>
        <td>Eylemler</td>
    </tr>

    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>
            <a href="{{ route('product.list',['brand_id' => $product->brand_id]) }}">Ürünler</a>
            <a href="{{ route('product.edit',['product_id' => $product->id]) }}">Düzenle</a>
            <a href="#" class="areYouSure" data-url="{{ route('product.remove',['product_id' => $product->id]) }}">Sil</a>
        </td>
    </tr>
    @endforeach
    @else
    <tr>
        <td colspan=2>Kayıt bulunamadı</td>
    </tr>
    @endif
</table>

@endsection


@section('script')
<script>
    var deleteLink = document.querySelectorAll('.areYouSure');

    for (var i = 0; i < deleteLink.length; i++) {
        deleteLink[i].addEventListener('click', function(event) {
            if (!confirm("Marka silinecek! Emin misiniz?")) {
                return false;
            }
            location.href = this.getAttribute('data-url')
        });
    }
</script>
@endsection