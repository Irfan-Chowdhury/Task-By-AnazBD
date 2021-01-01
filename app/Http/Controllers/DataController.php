<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Product;

class DataController extends Controller
{
    public function showAllProducts()
    {
        $data = $this->jsonData();

        return view('products',compact('data'));
    }

    public function fetchData()
    {
        return view('all_data');
    }

    public function fetchDataShow()
    {
        $data = $this->jsonData();

        session()->flash('type','success');
        session()->flash('message','40 items Fetched successfully');

        return view('all_data',compact('data'));
    }


    public function fetchDataStore()
    {
        $data = $this->jsonData();

        foreach ($data['data'] as $key => $value) {

            $product = new Product();

            $product->product_name   = $data['data'][$key]['name'];
            $product->original_price = $data['data'][$key]['original_price'];
            $product->rating         = $data['data'][$key]['rating'];
            $product->quantity       = $data['data'][$key]['variants'][0]['qty'];
            $product->feature_image  = $data['data'][$key]['feature_image'];
            $product->save();
        }

        // return response()->json("40 items store successfully");


        session()->flash('type','success');
        session()->flash('message','40 items stored in database successfully');

        return view('all_data');
    }

    


    protected function jsonData()
    {
        $jsonData = Http::get('https://test.anazbd.com/api/products')->json();

        return $jsonData;
    }

}



//https://stackoverflow.com/questions/43217872/laravel-htmlspecialchars-expects-parameter-1-to-be-string-object-given

// Testing Purpose

        // $quantity =  $data['data'][0]['variants'][0]['qty'];
        // return response()->json($quantity);

        // print_r($data['status']); //success
        // print_r("</br>".$data['message']); //40 items Fetched successfully
        // echo "</br>"."</br>";

        // $total = count($data['data']);

        

        // foreach ($data['data'] as $key => $value) {
        // //     // print_r($data['data'][$key]);

        // //     print_r("Name[$key] :".$data['data'][$key]['name']);
        // //     echo "</br>"."</br>";

        //     // print_r(json_encode($data['data'][$key]['seller']['name'], TRUE));
        //     echo $data['data'][$key]['seller']['name'];
        //     echo "</br>"."</br>";

        //     echo $data['data'][0]['variants'][0]['qty'];
        //     echo "</br>"."</br>";
        // }