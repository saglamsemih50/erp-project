<?php

namespace Modules\Purchase\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Purchase\Entities\ProductCategory;

class PurchaseCategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $productCategories = ProductCategory::all();
        return view('purchase::pages.purchase-products-category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('purchase::pages.purchase-products-category.ajax.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $category = ProductCategory::findOrNew($request->id);
        $category->company_id = 1;
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route("purchase-category-product.index")->with("success", "Veri Tabanına Kaydedildi")->with('alert-type', 'success');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('purchase::pages.purchase-products-category.ajax.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);

        return view('purchase::pages.purchase-products-category.ajax.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $category = ProductCategory::findOrNew($request->id);
        $category->company_id = 1;
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->route("purchase-category-product.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();
        return redirect()->route("purchase-category-product.index")->with("success", "Delete Category")->with("alert-type", "success");
    }
}
