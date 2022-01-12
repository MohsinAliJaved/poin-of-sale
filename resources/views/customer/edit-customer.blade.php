<form action="{{route('update-customer')}}" method="post"  enctype="multipart/form-data">
@csrf
<input type="text" name="id" value="{{$edit->id}}" hidden>
<input type="text" name="customer_id" value="{{$edit->customer_id}}">
<input type="text" name="customer_name" value="{{$edit->customer_name}}">
<input type="text" name="customer_contact" value="{{$edit->customer_contact}}">
<input type="text" name="customer_address" value="{{$edit->customer_address}}">
    <img style="height: 100px;width: 100px" src="{{asset('customerimages'.'/'.$edit['customer_image'])}}">
<input type="file" name="customer_image">
    <button type="submit">Update</button>

</form>