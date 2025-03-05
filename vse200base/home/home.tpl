{*
     < home.html
*}
{set $template = $theme ~ '/home/'}

{*Минифицируем и собираем css js*}
{'!MinifyX@Item' | snippet : [
    'cssSources'     =>
        $template ~ 'home.css',
    'jsSources'     =>
        $template ~ 'home.js'
]}