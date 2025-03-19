{*
     < home.html
*}
{set $template = $theme ~ '/home/'}

{*Минифицируем и собираем css js*}
{'!MinifyX@Item' | snippet : [
    'cssSources'     =>
        $theme_modules ~ 'bannerhead/bannerhead.css,' ~
        $template ~ 'home.css',
    'jsSources'     =>
        $template ~ 'home.js'
]}