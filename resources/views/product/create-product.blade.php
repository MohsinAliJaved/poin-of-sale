
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>



<form action="{{route('save-product')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h3>Product</h3>

<label>Name</label><br>
<input type="text" name="product_name"><br>
<label>Quantity</label><br>
<input type="number" name="product_quantity"><br>
<label>Price</label><br>
<input type="text" name="product_price"><br>
<label>Image</label><br>
<input type="file" name="customer_image"><br>
<button type="submit">Save</button>
<br>
</form>

<table>
    <thead>
    <th>Name</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Image</th>
    <th>Action</th>
    </thead>
    <tbody>
    @foreach($data as $key => $row)
        <tr>

            <td>{{$row['product_name']}}</td>
            <td>{{$row['product_quantity']}}</td>
            <td>{{$row['product_price']}}</td>
            <td><a href="{{url('delete-product').'/'.$row['id']}}">Delete</a>
                <a style="margin-left: 20px" href="{{url('edit-product').'/'.$row['id']}}">Edit</a></td>


        </tr>
    @endforeach
    </tbody>
</table>