{*
     < modules.html
*}
{set $template = $theme ~ '/modules/'}

{*Минифицируем и собираем css js*}
{'!MinifyX@Item' | snippet : [
    'cssSources'     =>
        $theme_modules ~ 'menutop/menutop.css,' ~
        $template ~ 'modules.css',
    'jsSources'     =>
        $jsfunc ~ 'attachEvents.js,' ~
        $jsfunc ~ 'removeClass.js,' ~
        $jsfunc ~ 'toggleSlide.js,' ~
        $jsfunc ~ 'debounce.js,' ~
        $theme_modules ~ 'menutop/menutop.js,' ~
        $template ~ 'modules.js'
]}