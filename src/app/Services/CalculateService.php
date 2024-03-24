<?php

declare(strict_types=1);

namespace App\Services;

class CalculateService
{
    private const TOTAL_SUM = 100;
    
    public function run($users): float|int
    {
        $total = self::TOTAL_SUM;
        if(count($users) > 0) {
            $total = self::TOTAL_SUM / count($users);
        }
        
        return round($total, 2);
    }
}