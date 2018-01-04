<?php

namespace RonAppleton\Radmin\TinyMce\Facades;

use Illuminate\Support\Facades\Facade;

class TinyMceFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tinymce';
    }
}