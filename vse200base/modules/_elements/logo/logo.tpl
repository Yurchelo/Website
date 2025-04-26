{*
     < logo.html
*}
{set $el_logo = [
    'classparent' => $el_logo_classparent ? ($el_logo_classparent ~ '__logo') : '',
    'href' => $el_logo_href ?: '/'
]}