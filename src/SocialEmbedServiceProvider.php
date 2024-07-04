<?php

namespace PrashantDhungana\SocialEmbed;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SocialEmbedServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('social-embed')
            ->hasViews();
    }
}
