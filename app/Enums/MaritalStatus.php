<?php


namespace App\Enums;


enum MaritalStatus: string
{

    case Unmarried = 'Unmarried';
    case Married = 'Married';
    case Divorced = 'Divorced';

    public function label(): string
    {
        return match ($this) {

            self::Unmarried => __("Bekar"),
            self::Married => __("Evli"),
            self::Divorced => __("Boşanmış"),
            default => __("Bekar"),
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
