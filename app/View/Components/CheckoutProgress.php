<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckoutProgress extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $steps = [
            [
                'label' => 'Shipping',
                'icon' => 'fas fa-map-marker-alt',
            ],
            [
                'label' => 'Payment',
                'icon' => 'fas fa-credit-card',
            ],
            [
                'label' => 'Confirmation',
                'icon' => 'fas fa-check',
            ],
        ];

        return view('components.checkout-progress');
    }
}
