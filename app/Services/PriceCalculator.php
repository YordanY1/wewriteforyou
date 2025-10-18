<?php

namespace App\Services;

use App\Models\Pricing;
use App\Models\Addon;

class PriceCalculator
{
    /**
     * Calculate total order price
     *
     * @param  int     $words         Number of words
     * @param  string  $deadlineOption  One of ['7d','3d','2d','24h','12h']
     * @param  array   $addonIds      Array of addon IDs
     * @param  string  $type          Pricing type: 'writing' | 'editing'
     * @param  bool    $detailed      Return breakdown or total only
     * @return float|array
     */
    public function calculate(
        int $words,
        string $deadlineOption,
        array $addonIds = [],
        string $type = 'writing',
        bool $detailed = false
    ): float|array {
        $pricing = Pricing::where('type', $type)
            ->where('words', '>=', $words)
            ->orderBy('words', 'asc')
            ->first();

        if (! $pricing) {
            throw new \Exception("Pricing not found for {$words} words ({$type}).");
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
