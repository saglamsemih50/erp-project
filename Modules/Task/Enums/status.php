<?php


namespace Modules\Task\Enums;

enum Status: string
{

    case Incomplete = 'incomplete';
    case Completed = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::Incomplete => __("Tamamlanmadı"),
            self::Completed => __("Tamamlandı"),
            default => __("Tamamlanmadı"),
        };
    }

    public function toArray(): array
    {

        $types = [];
        foreach (self::cases() as $type) {
            $types[] = $type->value;
        }

        return $types;
    }
}
