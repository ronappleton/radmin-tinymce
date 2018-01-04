<?php
/**
 * Created by PhpStorm.
 * User: ron
 * Date: 1/4/18
 * Time: 3:43 PM
 */

namespace RonAppleton\Radmin\TinyMce;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
        
    }

    public function boot()
    {
        $this->publishTinyMce();
    }

    private function publishTinyMce()
    {
        $this->publishes([
           $this->packagePath('/public/vendor/tinymce') => public_path('/vendor/tinymce'),
        ]);
    }

    private function packagePath($path)
    {
        return __DIR__ . "/../$path";
    }
}