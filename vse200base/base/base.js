/**
* base.js
*/
const baseFuncPath = '/assets/templates/js/func/';
(function()
{
    let copy;
    let initto = true;

    // Фиксация верхнего Тулбара
    function reScroll()
    {
        const   classFixed = 'fixed_js',
            classSroll = 'scroll_js',
            elFixed = document.querySelectorAll('.company_js'),
            h = 60, //- максимальная высота элемента, которая будет фиксироваться
            pageOfs = window.pageYOffset;

        if (elFixed.length === 1 && elFixed[0].offsetHeight < h)
        {
            copy = elFixed[0].cloneNode(true);
            document.body.appendChild(copy).classList.add(classSroll);
            let current = copy.querySelectorAll('[for]');

            for (let i = 0; i < current.length; i++)
            {
                current[i].setAttribute('for', 'lab' + i);
                current[i].previousElementSibling.setAttribute('id', 'lab' + i);
            }

            //clickUnCheck();
        }

        if (pageOfs > 200 && initto && elFixed[0].offsetHeight < h)
        {
            copy.classList.add(classFixed);
            initto = false;
            //changeContacts();
        }
        else if (pageOfs <= elFixed[0].offsetHeight + 40 && !initto || (elFixed[0].offsetHeight > h && !initto))
        {
            copy.classList.remove(classFixed);
            initto = true;
        }
    }

    function existVerticalScroll()
    {
        return document.body.offsetHeight > window.innerHeight;
    }

    function bottomFooter()
    {
        if(!existVerticalScroll())
        {
            document.documentElement.classList.add('noscroll_js');
        }
        else
        {
            document.documentElement.classList.remove('noscroll_js');
        }
    } bottomFooter();

    window.addEventListener('scroll', debounce(function(event)
    {
        reScroll();
        navlistFolderFix();
    }, 300));

    console.log('base.js');
})();