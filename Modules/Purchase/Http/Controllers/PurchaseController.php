<?php

namespace Modules\Purchase\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('purchase::pages.vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('purchase::pages.vendor.ajax.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        dd($request->all());
        return redirect()->route("vendor.index")->with("success", "Veri Tabanına Kaydedildi")->with('alert-type', 'success');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('purchase::pages.vendor.ajax.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('purchase::pages.vendor.ajax.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
        return redirect()->route("vendor.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        return redirect()->route("vendor.index")->with("success", "Delete Vendor")->with("alert-type", "success");
    }
}
