<?php

namespace PrashantDhungana\SocialEmbed;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Filament\Notifications\Notification;

class SocialEmbed extends TextInput
{
    protected string $view = 'social-embed::social-embed';

    protected string $width = '100%';

    protected string $height = '500';

    public static function make(string $name): static
    {

        return parent::make($name)
            ->placeholder('Enter Tiktok/Youtube Video URL')
            ->live(onBlur: true, debounce: 500)
            ->afterStateUpdated(function (Set $set, $state) use ($name) {
                $updatedLink = self::processLink($state);
                $set($name, $updatedLink);
            })
            ->required();
    }

    public function width(string $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function height(string $height): static
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): string
    {
        return $this->width;
    }

    public function getHeight(): string
    {
        return $this->height;
    }

    protected static function processLink($url): ?string
    {
        $embedLink = self::generateEmbedUrl($url) ?? '';

        if ($embedLink === null) {
            self::sendNotification('Unsupported video platform', 'danger');

            return null;
        }

        return $embedLink;
    }

    protected static function generateEmbedUrl($url): ?string
    {
        if (preg_match('/tiktok\.com\/@[\w\-]+\/video\/(\d+)/', $url, $matches)) {
            return "https://www.tiktok.com/embed/v2/{$matches[1]}";
        }

        if (preg_match('/youtube\.com\/watch\?v=([\w\-]+)/', $url, $matches) ||
            preg_match('/youtu\.be\/([\w\-]+)/', $url, $matches) ||
            preg_match('/youtube\.com\/embed\/([\w\-]+)/', $url, $matches)) {
            return "https://www.youtube.com/embed/{$matches[1]}";
        }

        return null;
    }

    protected static function sendNotification($message, $type): void
    {
        Notification::make()
            ->title($message)
            ->$type()
            ->send();
    }
}
