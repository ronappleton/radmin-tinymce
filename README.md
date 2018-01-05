# Radmin TinyMce

Radmin tinymce is the default editor for the radmin administration console for Laravel, included is the responsive filemanager by tecrail.

## Installation

Radmin-TinyMce can be installed by using:

        composer require ronappleton/radmin-tinymce
        
Radmin is Laravel 5.5+ so the package will auto discover, the Facade alias TinyMce is registered by the module making it usable within views.

By using:

        php artisan vendor:publish
        
and selecting ronappleton/radmin-tinymce, you can publish the config file (tinymce.php) and the scripts required to the public/vendor folder, it will publish the tinymce scripts and the responsive filemanager scripts also.

If you look at the tinymce.php config file you can get the gist of declaring your settings.

Note: you can create multiple configurations within the config file and call the configuration needed, when needed.

## Usage

You can enable tinymce on any of your radmin forms using the following:

        <script src="{{asset('vendor/tinymce/jquery.tinymce.min.js')}}"></script>
        <script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
        {!! TinyMce::isFor('[**config**]') !!}
        
 where [**config**] is the name of the config array you wish to use.
 
 Note: Where a setting option is not set in your config array, it will be populated from the default config array, so you only need to declare the settings you wish to change in your config array, also remember you must redclare an option to alter its default setting.
