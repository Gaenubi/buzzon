<x-layout> 
    <form method="post" action="/buzzon/public/sell" enctype="multipart/form-data">
        @csrf
        <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        </div> 

        <div>
        <label for="subcategory">Select category:</label>
        <select name="category" id="category">
            @foreach($subcats as $subcat)
            <option value="{{$subcat->id}}">{{$subcat->name}}</option>
            @endforeach
        </select>
        </div>

        <div>
        <label for="price">Price:</label>
        <input type="text" name="price">
        </div>

        <div>
        <label for="description">Description:</label>
        <input type="text"  name="description">
        </div>

        <div>
        <label for="discount_price">Discount Price:</label>
        <input type="text"  name="discount_price">
        </div>

        <div>
        <label for="image">Upload Photo:</label>
        <input type="file" name="image">
        </div>

        <div >
            <input value="Add product" type="submit">
        </div>   
    </form>
</x-layout>