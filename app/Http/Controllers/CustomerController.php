<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function createCustomer()
    {
        $data = Customer::select('id','customer_image','customer_id','customer_name','customer_contact','customer_address')
            ->orderBy('id','desc')
            ->get()->toArray();

        return view('customer.create-customer', compact('data'));
    }

    public function saveCustomer(Request $request)
    {
        $profileImage = null;
//        dd($request);
        if ($request->hasFile('customer_image')) {
            $request->validate([
                'file' => 'mimes:jpeg,bmp,png'
            ]);
            $file = $request->input('customer_image');
            $profileImage = $request->customer_image->hashName();

            $image = $request->file('customer_image');
            $destinationPath = public_path('customerimages');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $image->move($destinationPath, $profileImage);
        }

        $data = new Customer();
        $data->customer_id = $request->input('customer_id');
        $data->customer_name = $request->input('customer_name');
        $data->customer_contact = $request->input('customer_contact');
        $data->customer_address = $request->input('customer_address');
        $data->customer_image = $profileImage;
        $data->save();

        return redirect()->to('customer');
    }
    public function deleteCustomer($id){

        Customer::where('id', $id)->delete();
        return redirect()->to('customer');
    }
    public function editCustomer($id){

        $edit = Customer::where('id', $id)->first();
        return view('customer.edit-customer', compact('edit'));
    }
    public function updateCustomer(Request $request){

        $data = Customer::where('id', $request->input('id'))->first();


        $profileImage = null;
        if ($request->hasFile('customer_image')) {
//            dd(11);
            $request->validate([
                'file' => 'mimes:jpeg,bmp,png'
            ]);
            $file = $request->input('customer_image');
            $profileImage = $request->customer_image->hashName();

            $image = $request->file('customer_image');
            $destinationPath = public_path('customerimages');


            if(file_exists($destinationPath.'/'.$data->customer_image)){
                unlink($destinationPath.'/'.$data->customer_image);
            }


            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $image->move($destinationPath, $profileImage);
        }


        $data->customer_id = $request->input('customer_id');
        $data->customer_name = $request->input('customer_name');
        $data->customer_contact = $request->input('customer_contact');
        $data->customer_address = $request->input('customer_address');
        $data->customer_image = $profileImage;

        $data->save();
        return redirect()->to('customer');
    }
}
