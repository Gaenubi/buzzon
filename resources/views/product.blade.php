<x-layout></x-layout>
@foreach($products as $product)
<x-showcard>
            <x-slot:image>{{$post->image}}</x-slot>
            <x-slot:title>{{$post->title}}</x-slot>
            <x-slot:price>{{$post->price}}</x-slot>
</x-showcard>
@endforeach