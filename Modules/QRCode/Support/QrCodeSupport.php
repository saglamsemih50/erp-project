<?php

namespace Modules\QRCode\Support;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Modules\QRCode\Entities\QRCode;
use Modules\QRCode\Traits\QrTypes;
class QrCodeSupport
{
    use QrTypes;

    public  static function generate()
    {
        $value = new QrCodeBuilder();
        $value->encoding(new Encoding('UTF-8'))->errorCorrectionLevel(ErrorCorrectionLevel::High)
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->margin(0)
            ->validateResult(false);

        return $value;
    }
    public static function color(string $hex = '#1100ff')
    {
        if (!str($hex)->startsWith('#')) {
            $colorArray = explode(',', str_replace(' ', '', $hex));

            if (count($colorArray) >= 3) {

                if (count($colorArray) == 4) {
                    [$r, $g, $b, $a] = $colorArray;
                    return new Color($r, $g, $b, self::opacityConvert($a));
                }

                [$r, $g, $b] = $colorArray;
                return new Color($r, $g, $b);
            }
        }

        list($r, $g, $b) = sscanf($hex, '#%02x%02x%02x');
        return new Color($r, $g, $b);
    }


    public static function opacityConvert($opacity)
    {
        if ($opacity > 1) {
            return $opacity;
        }

        $converted = ($opacity * 127);

        return (int)(127 - $converted);
    }
    public function buildQrCode(QRCode $qRCode){

        $qr = QrCodeSupport::text($qRCode->data ?: '')->setSize($qRCode->size)
        ->margin($qRCode->margin)
        ->backgroundColor(self::color($qRCode->background_color))
        ->foregroundColor(self::color($qRCode->foreground_color));
    return $qr;
    }


}
