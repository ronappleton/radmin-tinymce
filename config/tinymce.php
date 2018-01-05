<?php

return [
    /**
     * You can create custom configs for tinymce for use in different areas
     * of your application.
     *
     * Simply create a new config array as default below, anything you omit
     * will be called from the default array, so you only need to add specific
     * changes you need in your config array.
     *
     * You specific config can then be called by the Facade on the page you need
     * it.
     */

    "default" => [

        "path_absolute" => "/",

        "selector" => "textarea",

        "theme" => 'modern',

        "plugins" => [
            "advlist",
            "autolink",
            "lists",
            "link",
            "image",
            "charmap",
            "print",
            "preview",
            "hr",
            "anchor",
            "pagebreak",
            "searchreplace",
            "wordcount",
            "visualblocks",
            "visualchars",
            "code",
            "fullscreen",
            "insertdatetime",
            "media",
            "nonbreaking",
            "save",
            "table",
            "contextmenu",
            "directionality",
            "emoticons",
            "template",
            "paste",
            "textcolor",
            "colorpicker",
            "textpattern",
            "codesample",
            //"fullpage", will add html to editor page;
            "toc",
            "spellchecker",
            "imagetools",
            "help",
        ],

        "toolbar1" => [
            ["insertfile", "undo", "redo"],
            ["styleselect"],
            ["bold", "italic", "strikethrough"],
            ["alignleft", "aligncenter", "alignright", "alignjustify"],
            ["ltr", "rtl"],
            ["bullist", "numlist", "outdent", "indent", "removeformat", "formatselect"],
        ],

        "toolbar2" => [
            ["code", "codesample"],
            ["forecolor", "backcolor"],
            ["responsivefilemanager"],
            ["link", "unlink", "anchor"],
            ["image", "media"],
            ["forecolor", "backcolor"],
            ["print", "preview"],
            ["emoticons", "charmap"],
        ],

        "image_advtab" => true,

        "browser_spellcheck" => true,

        "relative_urls" => true,

        "remove_script_host" => true,

        "external_filemanager_path" => "/filemanager/",

        "filemanager_title" => "Responsive Filemanager",

        "external_plugins" => [
            "filemanager" => '/filemanager/plugin.min.js',
        ]
    ],

];