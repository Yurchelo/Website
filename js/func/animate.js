/**
* Рисует функция draw — https://learn.javascript.ru/js-animation
 * @duration Продолжительность анимации
*/
function animate(draw, duration)
{
    const start = performance.now();

    requestAnimationFrame(function animate(time)
    {
        // определить, сколько прошло времени с начала анимации
        let timePassed = time - start;

        //console.log(time, start)
        // возможно небольшое превышение времени, в этом случае зафиксировать конец
        if (timePassed > duration) timePassed = duration;

        // нарисовать состояние анимации в момент timePassed
        draw(timePassed);

        // если время анимации не закончилось - запланировать ещё кадр
        if (timePassed < duration)
        {
            requestAnimationFrame(animate);
        }
    });
}