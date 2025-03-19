/**
** < modules.tpl
 */

function gamburger()
{
    //- gamburger
    attachEvents('.gamburger_js', "click", function(event)
    {
        event.preventDefault();

        if (!this.parentElement.classList.contains("close-js"))
        {
            removeClass('close-js');
        }

        this.parentElement.classList.toggle("close-js");
    });
}
gamburger();

//- submenu фиксатор после клика
function navlistFolderFix()
{
    attachEvents('.navlist__folder-js', "click", function(event)
    {
        event.preventDefault();

        let submenu = this.parentElement.querySelector('.navlist__sub-js');

        if (document.defaultView.getComputedStyle(submenu, null).position !== 'absolute')
        {
            toggleSlide(this, '', 'opened-js');
        }

        if (!this.parentElement.classList.contains("visible-js"))
        {
            removeClass('visible-js');
        }

        this.parentElement.classList.toggle("visible-js");
    });
}

(function ()
{
    navlistFolderFix();

    window.addEventListener('resize', debounce(function(event)
    {
        removeClass('visible-js');
    }, 300));

    console.log('menutop.js');
}()); //console.log(event);