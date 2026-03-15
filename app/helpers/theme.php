<?php

use App\Models\Setting;

if (!function_exists('current_theme')) {

    function current_theme(): string
    {
        static $theme = null;

        if ($theme === null) {
            $valid = ['diary', 'clean', 'system'];

            // 1. Cookie (paling prioritas — langsung dari client, selalu in-sync)
            if (!empty($_COOKIE['ui_layout']) && in_array($_COOKIE['ui_layout'], $valid)) {
                $theme = $_COOKIE['ui_layout'];
                return $theme;
            }

            // 2. Database (fallback)
            $setting = Setting::first();
            $raw = $setting->design_theme ?? 'diary';

            // Normalisasi nilai lama yang mungkin masih ada di database
            $legacyMap = [
                'diary_book'          => 'diary',
                'system_architecture' => 'system',
                'book'                => 'diary',
            ];

            $theme = $legacyMap[$raw] ?? (in_array($raw, $valid) ? $raw : 'diary');
        }

        return $theme;
    }

}

if (!function_exists('theme_view')) {

    /**
     * Resolve and return a themed view.
     *
     * Layout names (diary/clean/system) map to view folder names:
     *   diary  → themes/book/
     *   clean  → themes/clean/
     *   system → themes/system_architecture/
     *
     * @param  string  $view   Dot-notation relative to the theme folder
     *                         e.g. 'home.home', 'project.project', 'about'
     * @param  array   $data
     */
    function theme_view(string $view, array $data = [])
    {
        $theme = current_theme();

        // Map UI layout name → actual view folder name
        $folderMap = [
            'diary'  => 'book',
            'clean'  => 'clean',
            'system' => 'system_architecture',
        ];

        $folder   = $folderMap[$theme] ?? 'book';
        $viewPath = "themes.{$folder}.{$view}";

        // Fallback: try book theme
        if (!view()->exists($viewPath)) {
            $fallback = "themes.book.{$view}";
            if (view()->exists($fallback)) {
                $viewPath = $fallback;
            }
        }

        return view($viewPath, $data);
    }

}
