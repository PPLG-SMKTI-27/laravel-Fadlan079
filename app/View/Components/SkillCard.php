<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SkillCard extends Component
{
    public function __construct(
        public string $icon,
        public string $title,
        public string $subtitle,
        public ?string $badge = null,
        public array $items = [],
        public string $color = 'primary' // default
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.skill-card');
    }
}