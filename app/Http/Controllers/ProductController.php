<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller {
    
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index() {
        $data = Product::all();
        // $data = DB::select('SELECT * FROM product');
        return response()->json([
            'statusCode'    => 200,
            'message'       => 'get data product berhasil',
            'data'          => $data
        ], 200);
    }

    public function show($id) {
        $data = Product::where('id', $id)->get();
        // $data = DB::select('SELECT * FROM product where id='.$id);
        if(count($data) > 0){
            return response()->json([
                'statusCode'    => 200,
                'message'       => 'get data product dengan id '.$id.' berhasil',
                'data'          => $data[0]
            ], 200);
        }else{
            return response()->json([
                'statusCode'    => 404,
                'message'       => 'data product dengan id '.$id.' tidak ada',
            ], 404);
        }
    }

    public function store(Request $request) {
        $data = new Product();
        $data->nama_barang = $request->input('nama_barang');
        $data->qty = $request->input('qty');
        $data->save();

        return response()->json([
            'statusCode'    => 200,
            'message'       => 'insert data product berhasil !',
        ], 200);
    }

    public function update(Request $request, $id) {
        $data = Product::where('id', $id)->first();
        $data->nama_barang = $request->input('nama_barang');
        $data->qty = $request->input('qty');
        $data->save();

        return response()->json([
            'statusCode'    => 200,
            'message'       => 'update data product dengan id'.$id.' berhasil !',
        ], 200);
    }

    public function destroy($id) {
        $data = Product::where('id', $id)->first();
        $data->delete();

        return response()->json([
            'statusCode'    => 200,
            'message'       => 'delete data product dengan id '.$id.' berhasil !',
        ], 200);
    }
}
?>