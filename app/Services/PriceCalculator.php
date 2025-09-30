<?php

namespace App\Services;

use App\Models\Pricing;
use App\Models\Addon;

class PriceCalculator
{
    public function calculate(
        int $words,
        string $deadlineOption,
        array $addonIds = [],
        bool $detailed = false
    ): float|array {
        $pricing = Pricing::where('words', '>=', $words)
            ->orderBy('words', 'asc')
            ->first();

        if (! $pricing) {
            throw new \Exception("Pricing not found for {$words} words (above max).");
        }

        $basePrice = match ($deadlineOption) {
            '7d'  => $pricing->d7,
            '3d'  => $pricing->d3,
            '2d'  => $pricing->d2,
            '24h' => $pricing->d1,
            '12h' => $pricing->h12,
            default => $pricing->d7,
        };

        $addons = Addon::whereIn('id', $addonIds)->get();
        $addonsPrice = $addons->sum('price');

        $total = $basePrice + $addonsPrice;

        if ($detailed) {
            return [
                'base'   => $basePrice,
                'addons' => $addons->map(fn($a) => [
                    'id'    => $a->id,
                    'name'  => $a->name,
                    'price' => $a->price,
                ])->toArray(),
                'total'  => $total,
            ];
        }

        return $total;
    }
}
