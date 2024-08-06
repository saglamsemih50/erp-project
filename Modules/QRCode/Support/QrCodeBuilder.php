<?php

namespace Modules\QRCode\Support;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class QrCodeBuilder extends Builder
{
    private $data = "";
    private $extension = null;
    private $size = null;
    public function setData($data)
    {

        $this->data = $data;
        return $this->data($data);
    }
    public function getData()
    {

        return $this->data;
    }
    public function html()
    {

        $qrCode = $this->build();
        return '<img src="' . $qrCode->getDataUri() . '" />';
    }
    public function setSize($size)
    {

        $this->size = $size;
        return $this->size($size);
    }
    public function getSize()
    {

        return $this->size;
    }

    public function png()
    {
        $this->extension = "png";
        return $this->writer(new PngWriter);
    }
}
