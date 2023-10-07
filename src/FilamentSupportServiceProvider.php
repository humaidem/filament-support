<?php

namespace SmartEntity\FilamentSupport;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSupportServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-support')
            ->hasTranslations()
            ->hasViews();
    }
}
