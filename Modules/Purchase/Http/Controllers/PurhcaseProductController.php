<?php

namespace Modules\Purchase\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Purchase\Entities\Product;
use Modules\Purchase\Entities\ProductCategory;
use Modules\Purchase\Entities\PurchaseVendor;

class PurhcaseProductController extends Controller
{

    public function index()
    {
        $products = Product::with('vendor')->get();
        return view('purchase::pages.purchase-product.index', compact("products"));
    }


    public function create()
    {
        $categories = ProductCategory::all();
        $vendors = PurchaseVendor::all();
        return view('purchase::pages.purchase-product.ajax.create', compact('categories', 'vendors'));
    }


    public function store(Request $request)
    {
        $product = Product::findOrNew($request->id);
        $product->company_id = 1;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->vendor_id = $request->vendor_id;
        $product->selling_price = $request->selling_price;
        $product->cost_price = $request->cost_price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();
        return redirect()->route("purchase-product.index")->with("success", "Veri Tabanına Kaydedildi")->with('alert-type', 'success');
    }

    public function show($id)
    {

        $product = Product::with('vendor', "category",)->findOrFail($id);
        return view('purchase::pages.purchase-product.ajax.show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::with('vendor', 'category')->findOrFail($id);
        $categories = ProductCategory::all();
        $vendors = PurchaseVendor::all();

        return view('purchase::pages.purchase-product.ajax.edit', compact('categories', 'vendors', 'product'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrNew($request->id);
        $product->company_id = 1;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->vendor_id = $request->vendor_id;
        $product->selling_price = $request->selling_price;
        $product->cost_price = $request->cost_price;
        $product->stock = $request->stock;
        $product->description = $request->description;
        $product->save();
        return redirect()->route("purchase-product.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }


    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route("purchase-product.index")->with("success", "Delete Product")->with("alert-type", "success");
    }
}
