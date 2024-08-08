<?php

namespace Modules\QRCode\Http\Controllers;

use Illuminate\Http\Request;
use Modules\QRCode\Enums\Type;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Modules\QRCode\Entities\QRCode;
use Modules\QRCode\Support\QrCodeSupport;

class QRCodeController extends Controller
{
    public function index()
    {
        $qrCodeAll = QRCode::all();
        return view('qrcode::pages.qrcode.index', compact("qrCodeAll"));
    }

    public function create()
    {
        return view('qrcode::pages.qrcode.ajax.create');
    }
    public function fields(Type $type)
    {
        $view = 'qrcode::pages.fields.' . $type->value;
        $html = view($view, $this->data)->render();
        return  $html;
    }
    public function preview(Request $request)
    {
        $qr = $this->qrGenerate($request);
        $qr = $qr->png()->build()->getDataUri();
        return (['status' => 'success', 'qr' => $qr]);
    }
    private function qrGenerate(Request $request)
    {
        $qr = match (Type::tryFrom($request->type)) {
            Type::email => QrCodeSupport::email($request->email, $request->subject, $request->message),
            Type::event => $this->qrEvent($request),
            Type::sms => QrCodeSupport::sms($request->mobile, $request->country_phonecode, $request->message),
            Type::tel => QrCodeSupport::tel($request->mobile, $request->country_phonecode),
            Type::text => QrCodeSupport::text($request->message),
            Type::whatsapp => QrCodeSupport::whatsapp($request->mobile, $request->country_phonecode, $request->message),
            Type::wifi => QrCodeSupport::wifi($request->name, $request->password, $request->encryption, $request->hidden),
            Type::zoom => QrCodeSupport::url($request->url),
            default => QrCodeSupport::text($request->message ?: ''),
        };

        $qrSize = $request->size ?? 400;
        $qrMargin = $request->margin ?? 10;

        $qr->size($qrSize)
            ->margin($qrMargin)
            ->backgroundColor(QrCodeSupport::color($request->background_color ?? '#ffffff'))
            ->foregroundColor(QrCodeSupport::color($request->foreground_color ?? '#000000'));

        return $qr;
    }

    private function qrEvent(Request $request)
    {
        $startDateTime = Carbon::parse($request->start_date . ' ' . $request->start_time);

        $endDateTime = Carbon::parse($request->end_date . ' ' . $request->end_time);

        return QrCodeSupport::event(
            $request->title,
            $startDateTime,
            $endDateTime,
            $request->location,
            $request->note
        );
    }

    public function store(Request $request)
    {
        $qrCode = QRCode::findOrNew($request->Id);
        $qrCode->company_id = 1;
        $qrCode->title = $request->qrTitle;
        $qrCode->type = $request->type;
        $qrCode->size = $request->size;
        $qrCode->margin = $request->margin;
        $qrCode->foreground_color = $request->foreground_color;
        $qrCode->background_color = $request->background_color;
        $qrCode->form_data = $request->except([
            "_token",
            "qrTitle",
            "type",
            "size",
            "margin",
            "foreground_color",
            "background_color",
        ]);

        $qr = $this->qrGenerate($request);
        $qrCode->data = $qr->png()->build()->getDataUri();
        $qrCode->save();
        return redirect()->route("qrcode")->with("success", "Added QrCode")->with("alert-type", "success");
    }

    public function edit($id)
    {
        $this->qrCode = QRCode::findOrFail($id);
        $this->formFields = $this->qrCode->form_data;
        return view('qrcode::pages.qrcode.ajax.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $qrCode = QRCode::findOrNew($id);
        $qrCode->company_id = 1;
        $qrCode->title = $request->input("qrTitle");
        $qrCode->type = $request->input("type");
        $qrCode->size = $request->input("size");
        $qrCode->margin = $request->input("margin");
        $qrCode->foreground_color = $request->input("foreground_color");
        $qrCode->background_color = $request->input("background_color");
        $qrCode->form_data = $request->except([
            '_token',
            'qrTitle',
            'type',
            'size',
            'margin',
            'foreground_color',
            'background_color',
        ]);

        $qr = $this->qrGenerate($request);
        $qrCode->data = $qr->png()->build()->getDataUri();
        $qrCode->save();
        return redirect()->route("qrcode")->with("success", "Added QrCode")->with("alert-type", "success");
    }

    public function delete($id)
    {
        $qrCode = QRCode::findOrFail($id);
        $qrCode->delete();
        return redirect()->route("qrcode")->with("success", "Delete QrCode")->with("alert-type", "success");
    }

    public function filter(Request $request)
    {
        $type = $request->get("type");
        if ($type && $type !== 'all') {
            $qrCodeAll = QRCode::where("type", $type)->get();   //Secilen type
        } else {
            $qrCodeAll = QRCode::all();
        }
        return view("qrcode::pages.qrcode.partials.table", compact("qrCodeAll"))->render();
    }
}
