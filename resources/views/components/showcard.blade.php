<div class="showcard-container">
    <div class="title-box">
        <div>
        <img style="height:120px; width:120px;" src="http://localhost/buzzon/public/img/{{$image}}" alt="test">
        <h3>{{$name}}</h3>   
        <h4>{{$desc}}</h4>
        </div>
        {{$price}}
    </div>
    <div class="money-box">
    <a class="cart-link" href="/buzzon/public/cart/{{$id}}"> Add to cart</a>
    <a class="buy-link" href="#"> Buy now</a>
    </div>
</div>