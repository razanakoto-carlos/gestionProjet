<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RatingCalculator extends Component
{
    /**
     * Create a new component instance.
     */
    public $ratings;

    public function __construct($ratings)
    {
        $this->ratings = $ratings;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $average = (array_sum($this->ratings) * 100) / count($this->ratings);
        $average = min($average, 100);
        return view('components.rating-calculator', ['average' => $average]);
    }
}
