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
        $template ~ 'base.css,' ~
        $theme_modules ~ 'menutop/menutop.css,' ~
        $theme_modules ~ 'footer/footer.css',
    'minifyJs'      => 1,
    'registerJs'    => 'placeholder',
    'jsPlaceholder' => 'js_base',
    'jsSources'     =>
        $jsfunc ~ 'getEventListeners.js,' ~
        $jsfunc ~ 'attachEvents.js,' ~
        $jsfunc ~ 'removeClass.js,' ~
        $jsfunc ~ 'toggleSlide.js,' ~
        $jsfunc ~ 'debounce.js,' ~
        $theme_modules ~ 'menutop/menutop.js,' ~
        $template ~ 'base.js'
]}