<form action="{{route('update-product')}}" method="post">
    @csrf
<input type="text" name="product_name" value="{{$edit->product_name}}">
<input type="text" name="product_quantity" value="{{$edit->product_quantity}}">
<input type="text" name="product_price" value="{{$edit->product_price}}">
<button type="submit">Update</button>
</form>