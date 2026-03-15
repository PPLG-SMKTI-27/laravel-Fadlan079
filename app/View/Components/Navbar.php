<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    public function __construct(
        public array $menus = [],
        public ?string $brand = null
    ) {}

    public function render(): View|Closure|string
    {
        $theme = current_theme();

        // Map UI layout name → navbar view file name (same as theme_view() helper)
        $folderMap = [
            'diary'  => 'book',
            'clean'  => 'clean',
            'system' => 'system',
        ];

        $navbarName = $folderMap[$theme] ?? 'clean';
        $themeView  = "components.navbar.$navbarName";

        if (view()->exists($themeView)) {
            return view($themeView);
        }

        return view('components.navbar.clean');
    }
}
