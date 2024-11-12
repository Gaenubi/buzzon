<x-layout></x-layout>
<?php 
    $ordered = collect($products[0]['products'])->sortBy('subcat_id');
?>
@foreach($ordered as $product)
    <p>{{$product}} <br></p>
@endforeach