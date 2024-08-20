<?php

namespace Modules\Purchase\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Purchase\Entities\ProductCategory;
use Modules\Purchase\Entities\PurchaseVendor;

class PurhcaseProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('purchase::pages.purchase-product.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = ProductCategory::all();

        $vendors = PurchaseVendor::all();
        return view('purchase::pages.purchase-product.ajax.create', compact('categories', 'vendors'));
    }


    public function store(Request $request)
    {
        dd($request->all());
        return redirect()->route("purchase-product.index")->with("success", "Veri Tabanına Kaydedildi")->with('alert-type', 'success');
    }

    public function show($id)
    {
        return view('purchase::pages.purchase-product.ajax.show');
    }


    public function edit($id)
    {
        $categories = ProductCategory::all();

        $vendors = PurchaseVendor::all();
        return view('purchase::pages.purchase-product.ajax.edit', compact('categories', 'vendors'));
    }


    public function update(Request $request, $id)
    {
        dd($request->all());
        return redirect()->route("purchase-product.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }


    public function delete($id)
    {
        return redirect()->route("purchase-product.index")->with("success", "Delete Product")->with("alert-type", "success");
    }
}
