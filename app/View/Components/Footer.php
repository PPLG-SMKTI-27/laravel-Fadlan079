<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public function __construct(
        public string $brand = 'App',
        public string $description = '',
        public array $links = [],
        public array $socials = [],
        public ?int $year = null,
    ) {}

    public function render(): View|Closure|string
    {
        $theme = current_theme();

        $folderMap = [
            'diary'  => 'book',
            'clean'  => 'clean',
            'system' => 'system',
        ];

        $footerName = $folderMap[$theme] ?? 'clean';
        $themeView  = "components.footer.$footerName";

        if (view()->exists($themeView)) {
            return view($themeView);
        }

        return view('components.footer.clean');
    }
}
