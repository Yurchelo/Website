/**
** < modules.tpl
 */

loadResource(baseFuncPath + "attachEvents.js")
    .then(() =>
    {
        //- gamburger
        attachEvents('.gamburger_js', "click", function(event)
        {
            event.preventDefault();

            loadResource(baseFuncPath + "removeClass.js")
            .then(() =>
            {
                if (!this.parentElement.classList.contains("close-js"))
                {
                    removeClass('close-js');
                }

                this.parentElement.classList.toggle("close-js");
            });
        });
    })
    .catch(err => console.error(err));

(function ()
{
    console.log('menutop.js');
}()); //console.log(event);