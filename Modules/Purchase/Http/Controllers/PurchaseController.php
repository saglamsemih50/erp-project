<?php

namespace Modules\Purchase\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Purchase\Entities\PurchaseVendor;

class PurchaseController extends Controller
{

    public function index()
    {
        $purchaseVendors = PurchaseVendor::all();
        return view('purchase::pages.vendor.index', compact('purchaseVendors'));
    }


    public function create()
    {
        return view('purchase::pages.vendor.ajax.create');
    }

    public function store(Request $request)
    {
        $purchaseVendor = PurchaseVendor::findOrNew($request->id);
        $purchaseVendor->company_id = 1;
        $purchaseVendor->name = $request->name;
        $purchaseVendor->company_name = $request->company_name;
        $purchaseVendor->email = $request->email;
        $purchaseVendor->phone = $request->phone;
        $purchaseVendor->billing_address = $request->billing_address;
        $purchaseVendor->shipping_address = $request->shipping_address;
        $purchaseVendor->save();

        return redirect()->route("vendor.index")->with("success", "Veri Tabanına Kaydedildi")->with('alert-type', 'success');
    }


    public function show($id)
    {
        $purchaseVendor = PurchaseVendor::findOrFail($id);
        return view('purchase::pages.vendor.ajax.show', compact('purchaseVendor'));
    }


    public function edit($id)
    {
        $purchaseVendor = PurchaseVendor::findOrFail($id);
        return view('purchase::pages.vendor.ajax.edit', compact('purchaseVendor'));
    }


    public function update(Request $request, $id)
    {
        $purchaseVendor = PurchaseVendor::findOrNew($request->id);
        $purchaseVendor->company_id = 1;
        $purchaseVendor->name = $request->name;
        $purchaseVendor->company_name = $request->company_name;
        $purchaseVendor->email = $request->email;
        $purchaseVendor->phone = $request->phone;
        $purchaseVendor->billing_address = $request->billing_address;
        $purchaseVendor->shipping_address = $request->shipping_address;
        $purchaseVendor->save();
        return redirect()->route("vendor.index")->with("success", "Güncellendi")->with('alert-type', 'success');
    }


    public function delete($id)
    {
        $purchaseVendor = PurchaseVendor::findOrFail($id);
        $purchaseVendor->delete();
        return redirect()->route("vendor.index")->with("success", "Delete Vendor")->with("alert-type", "success");
    }
}
