{*
     < modules.html
*}
{set $template = $theme ~ '/modules/'}

{*Минифицируем и собираем css js*}
{'!MinifyX@Item' | snippet : [
    'cssSources'     =>
        $template ~ 'modules.css',
    'jsSources'     =>
        $template ~ 'modules.js'
]}