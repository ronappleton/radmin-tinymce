<?php
/**
 * Created by PhpStorm.
 * User: ron
 * Date: 1/4/18
 * Time: 3:43 PM
 */

namespace RonAppleton\Radmin\TinyMce;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function register()
    {
        $this->app->bind('tinymce', function () {
            return new TinyMceBuilder();
        });
    }

    public function boot()
    {
        $this->publishTinyMce();
        $this->publishConfig();
    }

    private function publishTinyMce()
    {
        $this->publishes([
            $this->packagePath('/public/vendor/tinymce') => public_path('/vendor/tinymce'),
        ]);
    }

    private function publishFileManager()
    {
        $this->publishes([
            $this->packagePath('/public/filemanager') => public_path('/filemanager'),
        ]);
        $this->publishes([
            $this->packagePath('/public/thumbs') => public_path('/vendor/thumbs'),
        ]);
    }

    private function publishConfig()
    {
        $this->publishes([
            $this->packagePath('config/tinymce.php') => config_path('tinymce.php'),
        ]);
    }

    private function packagePath($path)
    {
        return __DIR__ . "/../$path";
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['tinymce', TinyMceBuilder::class];
    }
}