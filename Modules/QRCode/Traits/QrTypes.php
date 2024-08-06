<?php

namespace Modules\QRCode\Traits;

use Illuminate\Support\Carbon;

trait QrTypes
{
    public static function text($text)
    {
        return self::generate()->setData($text);
    }
    public static function email($email, $subject = null, $body = null)
    {
        $data = 'mailto:' . $email;

        if ($subject) {
            $data .= '?subject=' . $subject;
        }

        if ($body) {
            $data .= '&body=' . $body;
        }

        return self::generate()->setData($data);
    }
    public static function tel($number, $countryCode = null)
    {
        $data = '';

        if ($countryCode) {
            $data .= '+' . $countryCode;
        }

        $data .= $number;

        return self::generate()->setData('tel:' . $data);
    }
    public static function sms($number, $countryCode = null, $smsBody = null)
    {
        $data = '';

        if ($countryCode) {
            $data .= '+' . $countryCode;
        }

        $data .= $number;

        if ($smsBody) {
            $data .= ':' . $smsBody;
        }

        return self::generate()->setData('SMSTO:' . $data);
    }

    public static function whatsapp($number, $countryCode = null, $text = null)
    {
        $data = 'https://wa.me/';

        if ($countryCode) {
            $data .= '+' . $countryCode;
        }

        $data .= $number;

        if ($text) {
            $data .= '/?text=' . urlencode($text);
        }

        return self::generate()->setData($data);
    }
    public static function url($url)
    {
        if (!str($url)->startsWith('http')) {
            $url = 'http://' . $url;
        }

        return self::generate()->setData($url);
    }

    public static function wifi($ssid, $password = null, $encryption = 'WPA', $hidden = false)
    {
        $data = 'WIFI:S:' . $ssid . ';';

        if ($password) {
            $data .= 'P:' . $password . ';';
        }

        if ($encryption) {
            $data .= 'T:' . $encryption . ';';
        }

        if ($hidden) {
            $data .= 'H:true;';
        }

        return self::generate()->setData($data);
    }


    public static function event($title, Carbon $startDateTime, Carbon $endDateTime, $location = null, $note = null)
    {
        $data = 'BEGIN:VCALENDAR' . "\n";
        $data .= 'VERSION:2.0' . "\n";
        $data .= 'PRODID:-//QRCode//Froiden 1.0//EN' . "\n";
        $data .= 'BEGIN:VEVENT' . "\n";

        $data .= 'SUMMARY:' . $title . "\n";

        $dateFormat = 'Ymd\THis';

        $data .= 'DTSTART:' . $startDateTime->format($dateFormat) . "\n";
        $data .= 'DTEND:' . $endDateTime->format($dateFormat) . "\n";

        if ($location) {
            $data .= 'LOCATION:' . str($location)
                ->replace(',', '\\,')
                ->replace(';', '\\;')->__toString() . "\n";
        }


        if ($note) {
            $data .= 'DESCRIPTION:' . str($note)
                ->replace('\r\n', '\\n')
                ->replace('\n', '\\n')
                ->replace(',', '\\,')
                ->replace(';', '\\;')->__toString() . "\n";
        }


        $data .= 'END:VEVENT' . "\n";
        $data .= 'END:VCALENDAR' . "\n";

        return self::generate()->setData($data);
    }
}
