/**
 * Removing classes and other actions on elements
 * @param classname
 * @param callback function (fires for each found element after the class is removed)
 */
function removeClass(classname, callback)
{
    const opened = document.querySelectorAll('.' + classname);
    for (let i = 0; i < opened.length; i++)
    {
        opened[i].classList.remove(classname);

        if (typeof callback === "function")
        {
            callback(opened[i]);
        }
    }
}