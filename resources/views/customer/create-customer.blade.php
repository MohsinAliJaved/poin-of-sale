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

<form action="{{route('save-customer')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h3>Customer</h3>
    <label>Id</label><br>
    <input type="number" name="customer_id"><br>
    <label>Name</label><br>
    <input type="text" name="customer_name"><br>
    <label>Contact</label><br>
    <input type="number" name="customer_contact"><br>
    <label>Address</label><br>
    <input type="text" name="customer_address"><br>
    <label>Image</label><br>
    <input type="file" name="customer_image"><br>
    <button type="submit">Save</button>
    <br>
</form>


<table>
    <thead>
    <th>Id</th>
    <th>Name</th>
    <th>Contact</th>
    <th>Address</th>
    <th>Image</th>
    <th>Action</th>
    </thead>
    <tbody>
    @foreach($data as $key => $row)
        <tr>
            <td>{{$row['customer_id']}}</td>
            <td>{{$row['customer_name']}}</td>
            <td>{{$row['customer_contact']}}</td>
            <td>{{$row['customer_address']}}</td>
            <td><img style="height: 100px;width: 100px" src="{{asset('customerimages'.'/'.$row['customer_image'])}}"></td>
            <td><a href="{{url('delete-customer').'/'.$row['id']}}">Delete</a>
                <a style="margin-left: 20px" href="{{url('edit-customer').'/'.$row['id']}}">Edit</a></td>

        </tr>
    @endforeach
    </tbody>
</table>

