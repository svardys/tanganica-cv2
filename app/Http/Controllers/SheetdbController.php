<?php

namespace App\Http\Controllers;

use Google\Service\Sheets;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Services\SheetdbServices;
use App\Models\Product;

class SheetdbController extends Controller
{
    public function getSheetData(){
        $data = (new SheetdbServices ())->readSheet(); //All data from sheet
        unset($data[0]); //Delete titles 

        $shops = array();    
        foreach ($data as $row){
            $shops[] =[
                'shop_id'      => $row[0], // shop_external_id
                'product_id'   => $row[1], // product_external_id
                'title'        => ((isset($row[2])) ? ($row[2]) : ('')), 
                'description'  => ((isset($row[3])) ? ($row[3]) : ('')), 
                'cost'         => ((isset($row[4])) ? ($row[4]) : ('')),
                'state_1'      => ((isset($row[5])) ? ($row[5]) : ('')),
                'state_2'      => ((isset($row[6])) ? ($row[6]) : ('')),
            ];

        }
        
        Product::upsert($shops,'product_id'); //insert or update if exists
        //return view('welcome',['rows' => $data,'update' => Carbon::now()]);
        //return response()->json($data);
    }

    public function showProducts(){
        $data = Product::all();
        return view('welcome',['products' => $data]);
    }

    public function showProduct($id){
        $data = Product::where('id',$id)->firstorfail();
        return view('show',['product' => $data]);
    }
}

