/**
* function handling events for one or more selected items
 * > Option getEventListeners.js отслеживание обработчиков на элементах, чтобы исключить дублирования
*/
function attachEvents(elementList, eventName, handlerFunction)
{
    if (elementList === null) return false;

    if(typeof elementList === "string") elementList = document.querySelectorAll(elementList);

    function antiduplex (el)
    {
        if (
            typeof el.getEventListeners === "function" &&
            !el.getEventListeners(eventName).length
        )
        {
            el.addEventListener(eventName, handlerFunction);
        }
        else if (typeof el.getEventListeners !== "function")
        {
            el.addEventListener(eventName, handlerFunction);
        }
    }

    if (elementList.length)
    {
        for(let i = 0; i < elementList.length; i++)
        {
            antiduplex(elementList[i]);
        }
    }
    else
    {
        if(typeof elementList.length === 'number') return false;

        antiduplex(elementList);
    }
}