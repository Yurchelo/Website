/**
 * для отложенной загрузки стилей и скриптов Мод.
 * @param uri function
 * @param callback function
 * @param types script default oder link
 */
function loaderBody(uri, callback, types)
{
    let old;

    //- Определяем есть ли уже загруженный скрипт по этому адресу
    if (uri)
    {
        old = document.querySelector('[href="'+ uri +'"], [src="'+ uri +'"]');
    }

    //- Если есть загруженный и нечего обрабатывать выходим
    if (!callback && old) return;

    //- Если есть что обрабатывать при условии уже загруженного скрипта или
    //- при отсутствии необходимости такового обрабатываем
    if (callback && (!uri || old))
    {
        callback();
        return;
    }

    //- Если нечего загружать выходим
    if (!uri) return;

    const type = types || 'script';
    const el = document.createElement(type);

    //- Отслеживаем тип загружаемого файла
    if (type === 'link')
    {
        el.rel = "stylesheet";
        el.href = uri;
    }
    else
    {
        el.src = uri;
    }

    document.body.appendChild(el);

    //- Если нечего обрабатывать выходим
    if (!callback) return;
    el.onload = () =>
    {
        callback();
    };
}