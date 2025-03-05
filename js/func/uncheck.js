/**
* Сбрасывание чекбокса
*/
function uncheck(type, el)
{
    const elements = document.querySelectorAll('.uncheck_js');
    /*let elements;

    if (typeof checkbox === 'object')
    {
        elements = checkbox;
    }
    else
    {
        elements = document.querySelectorAll(checkbox);
    }*/

    if (!elements.length) return false;

    for (let i = 0; i < elements.length; i++)
    {
        if (elements[i].checked && type !== 'change' && elements[i] !== el)
        {
            elements[i].checked = false;
        }
    }

    //console.log('uncheck()', type);
}