/**
* getEventListeners отслеживание обработчиков на элементах
 * if (!elementList[i].getEventListeners(eventName).length)
*/
(function()
{
    const originalAddEventListener = Element.prototype.addEventListener;
    const eventsMap = new WeakMap();

    Element.prototype.addEventListener = function(type, listener, options) {
        if (!eventsMap.has(this)) {
            eventsMap.set(this, []);
        }
        eventsMap.get(this).push({ type, listener, options });
        originalAddEventListener.call(this, type, listener, options);
    };

    Element.prototype.getEventListeners = function(type) {
        return eventsMap.get(this)?.filter(event => event.type === type) || [];
    };

    //console.log('getEventListeners()');
})();