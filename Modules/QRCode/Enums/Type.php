<?php

namespace Modules\QRCode\Enums;

enum Type: string
{

    case email = 'email';
    case event = 'event';
    case sms = 'sms';
    case tel = 'tel';
    case text = 'text';
    case whatsapp = 'whatsapp';
    case wifi = 'wifi';
    case zoom = 'zoom';

    public function label(): string
    {

        return match ($this) {

            self::email => __("E-Posta"),
            self::event => __("Etkinlik"),
            self::sms => __("SMS"),
            self::tel => __("Telefon"),
            self::text => __("Metin"),
            self::whatsapp => __("WhatsApp"),
            self::wifi => __("WiFi"),
            self::zoom => __("Zoom"),
            default => __("Metin"),
        };
    }
    public static function toArray()
    {
        $types = [];
        foreach (self::cases() as $type) {
            $types[] = $type->value;
        }
        return $types;
    }
}
