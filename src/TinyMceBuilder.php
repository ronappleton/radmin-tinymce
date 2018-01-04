<?php

namespace RonAppleton\Radmin\TinyMce;

class TinyMceBuilder
{
    public function isFor($config)
    {
        $config = config("tinymce.{$config}");

        if(empty($config))
        {
            return '';
        }

        return "Working Tiny MCE Facade";
    }
}