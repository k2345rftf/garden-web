<?php


namespace Content\Themes;

class Theme implements \Content\Themes\ITheme
{

    public static function section($theme,$name_section, $element = null)
    {
        if (!$element){
            $element = $name_section;
        }
        $path = ROOT_DIR.'/content/themes/'.$theme.'/'.$name_section.'/'.$element.'.php';
        if(is_file($path)){
            return require $path;
        }
        throw new \Exception('Theme: '.$theme. 'is not valid or element '.$element.'is not exist.');
    }
}