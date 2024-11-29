<x-layout></x-layout>
<h1>Accessible to sellers</h1>
@foreach($products as $product)
      <div>
      <a href="/buzzon/public/view/{{$product->id}}">view</a>
        <x-sellprod>
        <x-slot:name>{{$product['name']}}</x-slot>
        <x-slot:image>{{$product['image']}}</x-slot> 
        <x-slot:description>{{$product['description']}}</x-slot> 
        <x-slot:price>{{$product['price']}}</x-slot> 
        <x-slot:id>{{$product['id']}}</x-slot> 
        </x-sellprod>
      </div>                
@endforeach

