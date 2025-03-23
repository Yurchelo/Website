{*
     < modules.html
*}
{set $template = $theme ~ '/modules/'}

{*Минифицируем и собираем css js*}
{'!MinifyX@Item' | snippet : [
    'cssSources'     =>
        $theme_modules ~ 'sitesections/sitesections.css,' ~
        $theme_modules ~ 'bannerhead/bannerhead.css,' ~
        $template ~ 'modules.css',
    'jsSources'     =>
        $template ~ 'modules.js'
]}