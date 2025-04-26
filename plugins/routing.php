<?php
/** routing
 *
 */
switch ($modx->event->name)
{
    case 'OnHandleRequest':

		// Определяем системную переменную friendly urls
		$uri = $modx->context->getOption('request_param_alias', 'q');
		// Проверяем её наличие в запросе.
		if (!isset($_REQUEST[$uri])) break;

		// Разбиваем путь на массив сегментов
		$segments = explode('/', $_REQUEST[$uri]);

		// Если путь не из 3 сегментов
		if (count($segments) != 2) break;

		$uries_root = [
			'modules'
		];

		$modules = [];

		$dir = array(
			xPDO::OPT_CACHE_KEY => 'vse200base',
		);
		if ($output = $modx->cacheManager->get('modules', $dir))
		{
			$modules = $output;
		}

		// Если не соответствует категории или алиасу выходим
		if (!in_array($segments[0], $uries_root) || !in_array($segments[1], $modules)) break;

		// Ищем ресурс по полученному Ури
		if (!$id = $modx->findResource($segments[0])) break;

		//$modx->log(modX::LOG_LEVEL_ERROR, '[routing]: ' . print_r($id, 1));

		// Отправляем переменную
		$_POST['module'] = $segments[1];

		// Переходим на целевую страницу
		$modx->sendForward($id, '');

		//$modx->log(modX::LOG_LEVEL_ERROR, '[pl_test]: ' . print_r($camp, 1));

        break;
}