<?php

namespace RonAppleton\Radmin\TinyMce;

class TinyMceBuilder
{
    private $config;

    public function isFor($config)
    {
        $this->config = config("tinymce.{$config}");

        return $this->construct();
    }

    private function construct()
    {
        $editorSetupScript = '';

        $editorSetupScript .= $this->getPathAbsolute();

        $editorSetupScript .= $this->getSelector();

        $editorSetupScript .= $this->getTheme();

        if($this->getReadonly() == 'false')
        {
            $editorSetupScript .= $this->getPlugins();

            $editorSetupScript .= $this->getToolbar(1);

            $editorSetupScript .= $this->getToolbar(2);

            $editorSetupScript .= $this->getImageAdvtTab();

            $editorSetupScript .= $this->getBrowserSpellCheck();

            $editorSetupScript .= $this->getRelativeUrls();

            $editorSetupScript .= $this->getExternalFileManagerPath();

            $editorSetupScript .= $this->getFileManagerTitle();

            $editorSetupScript .= $this->getExternalPlugins();
        }
        else {
            $editorSetupScript .= "readonly: true, menubar: false, toolbar: false, statusbar: false";
        }


        $script = "<script>var editor_config = {{$editorSetupScript}}; tinymce.init(editor_config);</script>";

        return $script;
    }

    private function getPathAbsolute()
    {
        $pathAbsolute = $this->get('path_absolute') ?: $this->getDefault('path_absolute');

        return $pathAbsolute ? "path_absolute: \"{$pathAbsolute}\",": '';
    }

    private function getSelector()
    {
        $selector = $this->get('selector') ?: $this->getDefault('selector');

        return $selector ? "selector: \"{$selector}\",": '';
    }

    private function getTheme()
    {
        $theme = $this->get('theme') ?: $this->getDefault('theme');

        return $theme ? "theme: \"{$theme}\"," : '';
    }

    private function getPlugins()
    {
        $plugins = $this->get('plugins') ?: $this->getDefault('plugins');

        if(empty($plugins))
        {
            return '';
        }

        $plugins = is_array($plugins) ? implode(' ', $plugins) : $plugins;

        return "plugins: [\"{$plugins}\"],";
    }

    private function getToolbar($num = 1)
    {
        $toolbar = $this->get("toolbar{$num}") ?: $this->getDefault("toolbar{$num}");

        if(empty($toolbar) || !is_array($toolbar))
        {
            return '';
        }

        $toolbarOutput = '';

        for($i = 0; $i < count($toolbar); $i++)
        {
            $toolbarOutput .= implode(' ', $toolbar[$i]);
            $toolbarOutput .= $i < count($toolbar) - 1 ? " | " : '';
        }

        return "toolbar{$num}: \"{$toolbarOutput}\",";
    }

    private function getImageAdvtTab()
    {
        $imageAdvTab = $this->get('image_advtab') ?: $this->getDefault('image_advtab');

        $imageAdvTab = $this->getBool($imageAdvTab);

        return "image_advtab: {$imageAdvTab},";
    }

    private function getBrowserSpellCheck()
    {
        $browserSpellCheck = $this->get('browser_spellcheck') ?: $this->getDefault('browser_spellcheck');

        $browserSpellCheck = $this->getBool($browserSpellCheck);

        return "browser_spellcheck: {$browserSpellCheck},";
    }

    private function getRelativeUrls()
    {
        $relativeUrls = $this->get('relative_urls') ?: $this->getDefault('relative_urls');

        $relativeUrls = $this->getBool($relativeUrls);

        return "relative_urls: {$relativeUrls},";
    }

    private function getExternalFileManagerPath()
    {
        $externalFileManagerPath = $this->get('external_filemanager_path') ?: $this->getDefault('external_filemanager_path');

        return $externalFileManagerPath ? "external_filemanager_path: \"{$externalFileManagerPath}\"," : '';
    }

    private function getFileManagerTitle()
    {
        $fileManagerTitle = $this->get('filemanager_title') ?: $this->getDefault('filemanager_title');

        return $fileManagerTitle ? "filemanager_title: \"{$fileManagerTitle}\"," : '';
    }

    private function getExternalPlugins()
    {
        $externalPlugins = $this->get('external_plugins') ?: $this->getDefault('external_plugins');

        if(empty($externalPlugins) || !is_array($externalPlugins))
        {
            return '';
        }

        $output = '';

        $counter = 0;

        foreach($externalPlugins as $key => $value)
        {
            $output .= "\"{$key}\": \"{$value}\"";
            $output .= $counter < count($externalPlugins) ? "," : '';
            $counter++;
        }

        return "external_plugins: { {$output} }";
    }

    private function get($what)
    {
        return !empty($this->config["{$what}"]) ? $this->config["{$what}"] : false;
    }

    private function getDefault($what)
    {
        return config("tinymce.default.{$what}");
    }

    private function getBool($value)
    {
        return $value == 1 || $value == 'true' ? 'true' : 'false';
    }

    private function getReadonly()
    {
        return $this->getBool($this->get('readonly'));
    }
}