<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $products;

    public function __construct()
    {
        $this->products = new Product();
    }

    /**
     * 一覧画面
     */
    public function index()
    {
        $products = $this->products->findAllProducts();

        return view('products.index', compact('items'));
    }

    /**
     * 登録画面
     */
    public function create()
    {        
        return view('products.create');
    }

    /**
     * 登録処理
     */
    public function store(Request $request)
    {
        $this->products->insertProducts($request);
        return redirect()->route('products.index');
    }

    /**
     * 詳細画面の表示
     */
    public function show($id)
    {
        $product = Product::find($id); 

        return view('products.show', compact('product')); 
    }
}
