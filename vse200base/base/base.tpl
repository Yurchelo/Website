{*
     < base.html
*}
{var $theme = $templates ~ 'vse200base'}
{var $template = $theme ~ '/base/'}
{var $theme_css = $theme ~ '/css/'}
{var $theme_js = $theme ~ '/js/'}
{var $theme_modules = $theme ~ '/modules/'}
{var $modules_path = 'vse200base/modules/'}

{*Minify and collect css js*}
{'!MinifyX' | snippet : [
    'minifyCss'      => 0,
    'registerCss'    => 'placeholder',
    'cssPlaceholder' => 'css_base',
    'hooks'          => 'csshook',
    'cssSources'     =>
        $template ~ 'base.css',
    'minifyJs'      => 1,
    'registerJs'    => 'placeholder',
    'jsPlaceholder' => 'js_base',
    'jsSources'     =>
        $jsfunc ~ 'getEventListeners.js,' ~
        $template ~ 'base.js'
]}