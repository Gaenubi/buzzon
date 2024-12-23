Your order  has been placed.

@foreach($order->products as $product)
<x-prodcont>
    <x-slot:image>{{$product->image}}</x-slot>
            <x-slot:name>{{$product->name}}</x-slot>
            <x-slot:desc>{{$product->desc}}</x-slot>
            <x-slot:price>{{$product->price}}</x-slot>
            <x-slot:id>{{$product->id}}</x-slot>
    </x-prodcont>
@endforeach