<x-layout> 
    <form method="post" action="{{$product->id}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        </div> 

        <div>
        <label for="price">Price:</label>
        <input type="text" value="{{$product->price}}" name="price">
        </div>

        <div>
        <label for="description">Description:</label>
        <input type="text" value="{{$product->description}}" name="description">
        </div>

        <div>
        <label for="discount_price">Discount Price:</label>
        <input type="text" value="{{$product->discount_price}}" name="discount_price">
        </div>

        <div>
        <label for="image">Upload Photo:</label>
        <input type="file" name="image">
        </div>

        <div >
            <input value="Save" type="submit">
        </div>   
    </form>
</x-layout>