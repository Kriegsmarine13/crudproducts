<?php

namespace Kriegsmarine\crudproducts\controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Kriegsmarine\crudproducts\Models\Products;
use App\User;

class CrudProductsController extends Controller
{

    public function __construct(User $user){
        $this->user = $user;
    }

    public function index(){

        $products = Products::all();

        return view('crudproducts::main',['products' => $products]);
    }

    public function showForm(){
        return view('crudproducts::form', ['action' => 'create']);
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|min:10',
            'art' => 'required|alpha_num|unique:products,art',
        ]);

        $product = new Products();
        $product->name = $request->input('name');
        $product->art = $request->input('art');
        try {
            $product->save();
            return redirect()->to('/products');
        } catch(\Exception $e) {
            die('Error adding product');
        }

    }

    public function read($id){
        $productData = Products::findOrFail($id);

        return view('crudproducts::form', ['productData' => $productData, 'action' => 'update']);
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'bail|required|min:10',
            'art' => 'bail|required|alpha_num|unique:products,art',
        ]);

        $product = Products::findOrFail($id);

        //Разграничение по ролям
        if($this->user->role == 'admin'){
            $product->name = $request->input('name');
            $product->art = $request->input('art');
        } elseif($this->user->role == 'manager'){
            $product->name = $request->input('name');
        }

        try {
            $product->save();
            return redirect()->to('/products');
        } catch (\Exception $e) {
            die('Failed update');
        }
    }

    public function delete($id){
        $product = Products::findOrFail($id);

        $product->delete();

        return redirect()->to('/products');
    }
}
