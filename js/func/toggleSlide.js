/**
 * Replacement jQuery slideToggle
 * @param btn - control element
 * @param block - selector(string) or element or empty
 * @param classname - string
 * @param fnopen - function works when maximizing the content window
 * @param fnclose - function works when minimizing the content window
 */
function toggleSlide(btn, block, classname, fnopen, fnclose)
{
    let content;
    let height;

    if (typeof block === "string" && block !== '')
    {
        content = document.querySelector(block);
    }
    else if (block === '')
    {
        content = btn.nextElementSibling;
    }

    if (!content.classList.contains(classname))
    {
        content.classList.add(classname);
        btn.classList.add(classname);
        height = content.clientHeight + 'px';
        content.style.height = '0px';

        setTimeout(function ()
        {
            content.style.height = height;
        }, 0);

        content.addEventListener('transitionend', function ()
        {
            content.style.removeProperty('height');

            if (typeof fnopen === "function")
            {
                fnopen();
                //console.log(content);
            }

        }, { once: true });
    }
    else
    {
        height = content.clientHeight + 'px';
        content.style.height = height;

        setTimeout(function ()
        {
            content.style.height = '0px';
        }, 0);

        content.addEventListener('transitionend', function ()
        {
            content.style.removeProperty('height');
            content.classList.remove(classname);
            btn.classList.remove(classname);

            if (typeof fnclose === "function")
            {
                fnclose();
            }

        }, { once: true });
    }
}