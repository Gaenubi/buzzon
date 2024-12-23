<x-layout></x-layout>
@foreach($products as $product)
<x-showcard>
            <x-slot:image>{{$product->image}}</x-slot>
            <x-slot:name>{{$product->name}}</x-slot>
            <x-slot:desc>{{$product->desc}}</x-slot>
            <x-slot:price>{{$product->price}}</x-slot>
            <x-slot:id>{{$product->id}}</x-slot>
</x-showcard>
@endforeach