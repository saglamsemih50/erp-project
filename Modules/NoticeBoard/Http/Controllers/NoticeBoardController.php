<?php

namespace Modules\NoticeBoard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NoticeBoardController extends Controller
{

    public function index()
    {
        return view('noticeboard::pages.notice.index');
    }


    public function create()
    {
        return view('noticeboard::pages.notice.ajax.create');
    }
    public function store(Request $request)
    {

        return redirect()->route("notice")->with("succes", "Veri Tabanına Başarıyla kaydedildi")->with('alert-type', 'success');
    }


    public function show($id)
    {
        return view('noticeboard::pages.notice.ajax.show');
    }


    public function edit($id)
    {
        return view('noticeboard::pages.notice.ajax.edit');
    }


    public function update(Request $request, $id)
    {

        return redirect()->route("notice")->with("success", "Güncellendi")->with('alert-type', 'success');
    }

    public function delete($id)
    {
        return redirect()->route("notice")->with("success", "Delete Notice")->with("alert-type", "success");
    }
}
