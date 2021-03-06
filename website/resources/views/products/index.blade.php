@extends('layouts.app')

@section('content')
<!-- DK:Pętla listująca produkty, które są aktywne i są w danej grupie. W środku przekierowanie idące do szczegółów danego produktu-->
<div class="row">
    @foreach($products as $product)
        <div class="col-4 text-center">
            @foreach($product->Product_Photos_NO as $photo)
                @if($loop->first)
                    <div class="row text-center">
                        <div class="col-12">
                            <img src="{!!$photo->path!!}" />
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('products.details', [$product->Products_Group->name,$product->id]) }}">{!!$product->name!!}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
