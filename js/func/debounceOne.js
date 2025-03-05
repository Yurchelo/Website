/**
 * Оптимизирует выполнение кода при слишком частых наступлений события, выполняется только один раз
 * @param fn function
 * @param delay time
 */
function debounceOne(fn, delay)
{
    let timer = null;
    let isFirstRun = true;

    return function (...args)
    {
        // Если это первый запуск, запускаем отложенную загрузку
        if (isFirstRun)
        {
            isFirstRun = false;
            timer = setTimeout(() => {
                fn.apply(this, args);
            }, delay);
        }
        else
        {
            // При последующих вызовах ограничиваем выполнение функцией debounce
            if (!timer)
            {
                timer = setTimeout(() =>
                {
                    fn.apply(this, args);
                    timer = null; // Сбрасываем таймер, чтобы можно было запустить функцию через промежуток времени
                }, delay);
            }
        }
    };
}