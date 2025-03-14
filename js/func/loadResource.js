/**
* для отложенной загрузки стилей и скриптов
 * не проверен****
*/
function loadResource(uri, type = "script")
{
    return new Promise((resolve, reject) => {
        if (!uri)
        {
            reject(new Error("URI не указан"));
            return;
        }

        if (document.querySelector(`[href="${uri}"], [src="${uri}"]`))
        {
            resolve(); // Уже загружено
            return;
        }

        const el = document.createElement(type === "link" ? "link" : "script");

        if (type === "link")
        {
            el.rel = "stylesheet";
            el.href = uri;
        }
        else
        {
            el.src = uri;
        }

        el.onload = () => resolve();
        el.onerror = () => reject(new Error(`Ошибка загрузки: ${uri}`));

        document.head.appendChild(el);
    });
}
// Загрузка скрипта
/*
loadResource("https://cdn.jsdelivr.net/npm/htmx.org@1.9.6")
    .then(() => console.log("HTMX загружен!"))
    .catch(err => console.error(err));*/
