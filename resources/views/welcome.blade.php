<x-layout></x-layout>
<div class="main-container">
    @foreach($cat as $cate) 
    <div class="cat-container">
        <h4>{{$cate->name}}</h4>
        <div class="subcat-container">
            @foreach($cate->subcats->take(4) as $subcat)
                <?php    
                $num = $subcat['id'];
                ?>
                <a href="/buzzon/public/view/{{$num}}">
                <x-homecard>
                <x-slot:title>{{$products[$num - 1]['name']}}</x-slot>
                <x-slot:image>{{$products[$num - 1]['product']['image']}}</x-slot> 
                </x-homecard>         
                </a>
            @endforeach
        </div>
    </div> 
    @endforeach
</div>
   
