<x-layout></x-layout>
@stack('cart')
<form action="/buzzon/public/buy" method="post">
    @csrf
    <?php 
    $count = 0;
    ?>
    @foreach($cart['0']->products as $product)
   <div>
   <input type="checkbox" class="checkbox" name="cart[{{$count}}][product]" value="{{$product->id}}" >
   <input type="number" class="quantity" name="cart[{{$count}}][quantity]" value="1">
    <x-prodcont>
    <x-slot:image>{{$product->image}}</x-slot>
            <x-slot:name>{{$product->name}}</x-slot>
            <x-slot:desc>{{$product->desc}}</x-slot>
            <x-slot:price>{{$product->price}}</x-slot>
            <x-slot:id>{{$product->id}}</x-slot>
    </x-prodcont>
   </div>
   <?php
   $count+=1;
   ?>
    @endforeach
    <h1 id="totalprice"></h1>
    <input type="submit" value="CHECKOUT" name="buy" id="buy">
</form>
