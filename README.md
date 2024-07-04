# SocialEmbed Plugin

The `SocialEmbed` plugin is a custom Filament form component that allows users to embed TikTok and YouTube videos by providing a URL. This component extends the `TextInput` component from the Filament Forms library.

## Features

- Supports embedding videos from TikTok and YouTube.
- Customizable width and height for the embedded video.
- Automatic URL processing to generate the correct embed link.
- Live validation and updating of the embed link.
- Notification support for unsupported video platforms.

## Installation

1. Require the plugin via Composer:

    ```bash
    composer require prashantdhungana/social-embed
    ```

2. Add the `SocialEmbed` component to your form:

    ```php
    use PrashantDhungana\SocialEmbed\SocialEmbed;

    SocialEmbed::make('video');
    ```

## Usage

### Basic Usage

To use the `SocialEmbed` component in your form, simply call the `make` method and pass the name of the field:

    ```php
    use PrashantDhungana\SocialEmbed\SocialEmbed;

    SocialEmbed::make('video');
    ```

This will create a text input field with a placeholder prompting the user to enter a TikTok or YouTube video URL.

### Customizing Dimensions
You can customize the width and height of the embedded video using the width and height methods:

    ```php
    use PrashantDhungana\SocialEmbed\SocialEmbed;

    SocialEmbed::make('video_url')
        ->width('80%')
        ->height('400');
    ```
### Notifications
If the provided URL is from an unsupported video platform, a notification will be displayed to the user.

## Methods
`make(string $name): static`
Creates a new instance of the `SocialEmbed` component.

`width(string $width): static`
Sets the width of the embedded video. Accepts a string representing the width (e.g., `'100%'`).

`height(string $height): static`
Sets the height of the embedded video. Accepts a string representing the height (e.g., `'500'`).

`getWidth(): string`
Returns the current width of the embedded video.

`getHeight(): string`
Returns the current height of the embedded video.

## Processing Links
The `processLink` method automatically processes the provided URL and generates the appropriate embed link. If the URL is not supported, a notification will be sent to the user.

## Supported Platforms
- TikTok
- YouTube

## Example URL Formats
- Tiktok: `https://www.tiktok.com/@username/video/123456789` 
- Youtube: `https://www.youtube.com/watch?v=abcdefghijk`, `https://youtu.be/abcdefghijk`, `https://www.youtube.com/embed/abcdefghijk`

## License
This project is open-source and available under the MIT License.

## Contributing
Contributions are welcome! Please submit a pull request or open an issue to discuss any changes.

## Credits
- [Prashant Dhungana](https://github.com/PrashantDhungana)