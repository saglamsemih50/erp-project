<?php


namespace App\Enums;


enum Gender: string
{

    case Male = 'male';
    case Female = 'female';

    public function label(): string
    {
        return match ($this) {
            self::Male => __("Erkek"),
            self::Female => __("Kadın"),
            default => __("Erkek"),
        };
    }
    public static function toArray(): array
    {
        $types = [];
        foreach (self::cases() as $type) {
            $types[] = $type->value;
        }
        return  $types;
    }
}
