<?php

namespace SmartEntity\FilamentSupport\Pages;


use Illuminate\Contracts\Support\Htmlable;

class Page extends \Filament\Pages\Page
{

    protected static string $view = 'filament-support::pages.page';

    public static function getNavigationLabel(): string
    {
        return __(static::$title ?? '');
    }

    public function getPageContent(): array
    {
        return [];
    }

    public function getBreadcrumbs(): array
    {
        return static::breadcrumbs() ?? [];
    }

    public function getTitle(): string|Htmlable
    {
        return __(static::$title ?? '');
    }
}
