@extends('layout')
@section('title', 'Marka Listesi')

@section('content')

<a href="{{ route('brand.list') }}">Markalar</a>
<span> - </span>
<a href="{{ route('brand.new') }}">Marka Ekle</a>
<hr>

<table width="100%" border=1>
    @if($brands?->count())
    <tr>
        <td>Marka</td>
        <td>Eylemler</td>
    </tr>

    @foreach($brands as $brand)
    <tr>
        <td>{{ $brand->name }}</td>
        <td>
            <a href="{{ route('product.list',['brand_id'=>$brand->id]) }}">Ürünler</a>
            <a href="{{ route('brand.edit',['brand_id'=>$brand->id]) }}">Düzenle</a>
            <a href="#" data-url="{{ route('brand.remove',['brand_id'=>$brand->id]) }}" class="areYouSure">Sil</a>
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