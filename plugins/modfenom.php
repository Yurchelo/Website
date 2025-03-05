<?php
/** @var modX $modx
 * Fenom modifiers
 */
switch ($modx->event->name) {
    case 'pdoToolsOnFenomInit':

		//- Converting to JSON with Unicode
		/*$fenom->addModifier('toJSONunicod', function ($input)
		{
			if (!is_array($input)) return $input;

			return json_encode($input, JSON_UNESCAPED_UNICODE);
		});*/

		//- Wrapping a string in tags
		//- Оборачивание строки в теги
		/*
            $input
            $param - string - tag HTML (Оборачивает строку в код)
        */
		/*$fenom->addModifier('wrap_tag', function ($input, $param)
		{
			$order = array("\r\n", "\n", "\r");

			$tag = '<'.$param.'>';
			$tag_end = '</'.$param.'>';

			$content = $tag.$input.$tag_end;
			$content = str_replace($order, $tag_end.$tag, $content);
			$content = str_replace($tag.$tag_end, '', $content);

			return $content;
		});*/

		//- Оборачивание строки в теги
		/*$fenom->addModifier('wrap_tags', function ($input, $param) use ($modx)
		{
			$order = array("\r\n", "\n", "\r");

			if ($param == 'br')
			{
				return str_replace($order, '<br>', $input);
			}

			if ($param == 'dl')
			{
				$content = str_replace($order, '##', $input);
				$content_arr = explode('##', $content);

				$contents_tag = array();

				foreach ($content_arr as $k => $content)
				{
					if ($k % 2 == 0)
					{
						$contents_tag[] = '<dt>' . $content . '</dt>';
					}
					else
					{
						$contents_tag[] = '<dd>' . $content . '</dd>';
					}
				}

				return implode("\r\n", $contents_tag);
			}

			if ($param == 'p' && preg_match('/^(https|http):\/\/.*?/i', $input))
			{
				$content = str_replace($order, '##', $input);
				$content_arr = explode('##', $content);

				$contents_tag = array();
				$contents_tag_a = '';
				foreach ($content_arr as $k => $content)
				{
					if ($k % 2 == 0)
					{
						$contents_tag_a = '<a href="' . $content . '" target="_blank">';
					}
					else
					{
						$contents_tag[] = '<li>' . $contents_tag_a . $content . '</a></li>';
					}
				}

				return '<ul>' . implode("\r\n", $contents_tag) . '</ul>';
			}

			if ($param == 'p' && preg_match('/^--(\\S+)/i', $input))
			{
				$matches = array();
				preg_match_all('/--(\\S+)/i', $input, $matches);

				if (!$minidocs = $modx->getCollection('miniDocument', array('alias:IN' => $matches[1])))
				{
					$modx->log(modX::LOG_LEVEL_ERROR, "Ошибка получения объектов miniDocument с Алиасами: {$input}");
				}

				$links = array();

				foreach ($minidocs as $minidoc)
				{
					$link = $modx->makeUrl($minidoc->get('resource_id'));

					$links[] = '<li>'. $minidoc->get('documentType') . ' <a href="' . $link . '">' . $minidoc->get('alias') . '</a></li>';
					//$links[] = $minidocument->get('resource_id');
				}
				return '<p>Зависимости</p><ul>' . implode("\r\n", $links) . '</ul>';
			}

			$tag = '<'.$param.'>';
			$tag_end = '</'.$param.'>';

			$content = $tag.$input.$tag_end;
			$content = str_replace($order, $tag_end.$tag, $content);
			$content = str_replace($tag.$tag_end, '', $content);

			return $content;
		});*/

		//- Temperature rounding and more
		/*$fenom->addModifier('round', function ($input)
		{
			$input_int = $input * 1;
			$input_str = str_replace($input_int, '', $input);

			return $input_str . round($input_int);
		});*/

		//- preg_match with getting the desired occurrence
		/*$fenom->addModifier('preg_match_get', function ($input, $param)
		{
			preg_match($param, $input, $matches);
			return $matches[1] ?: "";
		});*/

		//- Finds the equivalent value of the given field from custom tables
		//- Находит эквивалент значения заданного поля из кастомных таблиц
		/*$fenom->addModifier('dbdata', function ($velue, $class = '', $field = '', $source = '') use ($modx)
		{
			if (!$class || !$velue || !$field) return $velue;

			$pdoFetch = $modx->getService('pdoFetch');

			if (!$arr = $pdoFetch->getArray($class, $velue))
			{
				$modx->log(modX::LOG_LEVEL_ERROR, print_r(array(
						'source' => 'Modifier[dbdata]',
						'message' => 'Ошибка получения объекта',
						'ID' => $velue,
						'class' => $class,
						'call' => $source
					), 1));
				return $velue;
			}

			return $arr[$field];
		});*/

		//- Obtaining an array of data collections from custom tables
		//- Получение массива кллекции данных из кастомных таблиц
		/*$fenom->addModifier('dbdataarray', function ($velue, $class = '', $field = '') use ($modx)
		{
			if (!$class || !$velue || !$field) return $velue;

			$pdoFetch = $modx->getService('pdoFetch');

			if (!$arr = $pdoFetch->getCollection($class, array(
				$field => $velue
			)))
			{
				return $velue;
			}

			return $arr;
		});*/

		//- Optimized image output
		//- Вывод оптимизированного изображегния
		/*$fenom->addModifier('pthumb', function ($input, $options) use ($modx)
		{
			$output = $modx->runSnippet('pthumb', array(
				'input' => $input,
				'options' => $options
			));

			return $output;
		});*/

		//- Подсчёт количества дочерних ресурсов
		/*$fenom->addModifier('child_count', function ($input, $param) use ($modx)
		{
			$criteria = array(
				'parent'    => $input,
				'template'  => $param,
				'deleted'   => 0,
				'published' => 1
			);

			return $modx->getCount('modResource', $criteria);
		});*/

		//- Получение заданной скидки
		/* $fenom->addModifier('discont', function ($input, $param)
		 {
			 $input = (int)$input;
			 $output = $input - (($input / 100) * $param);

			 return $output;
		 });*/

		//- Реверс данных массива
		/* $fenom->addModifier('array_reverse', function ($input)
		 {
			 $output = array_reverse($input);

			 return $output;
		 });*/

		//- Оборачивание строки с телефоном в теги
		/*$fenom->addModifier('wrap_tag_a_tel', function ($input, $param, $divider)
		{
			$order = array("\r\n", "\n", "\r", " ");

			$content1 = str_replace($order, ',', $input);
			$number = explode(',', $content1);

			$tag = '<'.$param.'>';
			$tag_end = '</'.$param.'>';

			$content = '';
			foreach ($number as $key)
			{
				$number = explode($divider, trim($key));

				if (count($number) != 2) return $input;

				$kod            = '(' . $number[0] . ') ';
				$number_link    = $number[0] . $number[1];

				if (strlen($number[1]) == 6)
				{
					$number = preg_replace('/^(\d{2})(\d{2})(\d{2})$/', '\1-\2-\3', $number[1]);
				}
				elseif (strlen($number[1]) == 7)
				{
					$number = preg_replace('/^(\d{3})(\d{2})(\d{2})$/', '\1-\2-\3', $number[1]);
				}
				else
				{
					return 'Неверное количество символов';
				}

				$content .= $tag . '<a href="tel:+38' . $number_link . '" rel="nofollow">'. $kod . $number . '</a>' . $tag_end;
			}

			return $content;
		});*/

		//- Форматирование строки с телефоном
		/*
			$input
			$param - string - tag HTML (Оборачивает код оператора) - 'none' - исключает оборачивание
			$divider - string - символ, который отделяет код оператора
			$city - bulian - Выводить ли код города перед отфармотированном номером телефона
		*/
		/*$fenom->addModifier('format_tel', function ($input, $param, $divider, $city)
		{
			$citydefult = '+38';
			$city = $city ? $citydefult . ' ' : '';
			$divider = $divider ?: '.';

			$order = array("\r\n", "\n", "\r");

			$content1 = str_replace($order, ',', $input);
			$number = explode(',', $content1);

			switch ($param)
			{
				case 'none':

					$tag        = '';
					$tag_end    = '';

					break;

				case '()':

					$tag        = '(';
					$tag_end    = ')';

					break;

				case '':

					$tag        = '<span>';
					$tag_end    = '</span>';

					break;

				default:

					$tag        = '<'.$param.'>';
					$tag_end    = '</'.$param.'>';
			}

			$content = '';
			foreach ($number as $key)
			{
				$number = explode($divider, trim($key));

				if (count($number) != 2) return $input;

				$kod = $tag . $city . $number[0] . $tag_end . ' ';

				if (strlen($number[1]) == 6)
				{
					$number = preg_replace('/^(\d{2})(\d{2})(\d{2})$/', '\1-\2-\3', $number[1]);
				}
				elseif (strlen($number[1]) == 7)
				{
					$number = preg_replace('/^(\d{3})(\d{2})(\d{2})$/', '\1-\2-\3', $number[1]);
				}
				else
				{
					return 'Неверное количество символов';
				}

				$content .= $kod . $number;
			}

			return $content;
		});*/

		//- Получение текущей метки
		/* $fenom->addModifier('time_unix', function ($input)
		 {
			 if ($input == '')
			 {
				 return time();
			 }
			 else
			 {
				 return strtotime($input);
			 }
		 });*/

		//- Версионность файлов
		/* $fenom->addModifier('fileversion', function ($input) use ($modx)
		 {
			 $file_path = MODX_BASE_PATH.$input;

			 if (file_exists($file_path))
			 {
				 return $input."?".md5_file($file_path);
			 }
			 else
			 {
				 return $input;
			 }
		 });*/

		//- Оборачивание строки, обозначимой символами в теги
		/*$fenom->addModifier('wrap_tag_simbol', function ($input, $param)
		{
			$content = str_replace('[', '<' . $param . '>', $input);
			$content = str_replace(']', '</' . $param . '>', $content);

			return $content;
		});*/

		//- Преобразует первый символ строки в верхний регистр
		/*$fenom->addModifier('ucfirst_one', function ($input)
		{
			mb_internal_encoding("UTF-8");

			return mb_strtoupper(mb_substr($input, 0, 1)) . mb_substr($input, 1);
		});*/

		//- Экранирование феном тегов
		/*$fenom->addModifier('wrap_ignore', function ($input)
		{
			return '{set:ignore $ignore}' . $input . '{/set}{$ignore}';
		});*/

		//- Кеширование элементов впроизвольной папке
		$fenom->addModifier('cache_set', function ($input, $name, $dir = '', $time = 0) use ($modx)
		{
			if ($dir)
			{
				$dir = array(
					xPDO::OPT_CACHE_KEY => $dir,
				);
			}

			$modx->cacheManager->set($name, $input, $time, $dir);
		});

		//- Кеширование элементов впроизвольной папке
		$fenom->addModifier('cache_get', function ($input, $name, $dir = '') use ($modx)
		{
			if ($dir)
			{
				$dir = array(
					xPDO::OPT_CACHE_KEY => $dir,
				);
			}

			if (!$output = $modx->cacheManager->get($name, $dir))
			{
				return $input;
			}

			return $output;
		});

		//- Чтение содержимого из файла
		/*$fenom->addModifier('file_get', function ($input) use ($modx)
		{
			$puth = $modx->getOption('pdotools_elements_path') . $input;

			if (!file_exists($puth)) return 'non files<>';

			//return file_get_contents($puth);
			return '{set:ignore $ignore}' . file_get_contents($puth) . '{/set}{$ignore | esc}';
		});*/

		/**
		 * Получение перевода объекта через обращение в хранилище
		 * $input - Значение
		 * $classKey
		 * $field
		 */
		/*$fenom->addModifier('lang_store', function ($input, $classKey = '', $field = '') use ($modx)
		{
			if (!$classKey || !$field) return $input;

			$cultureKey = $modx->getOption('cultureKey');

			if ($cultureKey == 'ru') return $input;

			if (!$obj = $modx->getObject($classKey, array(
				$field . '_ru' => $input,
			)))
			{
				$modx->log(modX::LOG_LEVEL_ERROR,'[Modifier - lang_store] Ошибка получения объекта: ' . $classKey . '. Input: ' . $input);
				return $input;
			}

			return $obj->get($field . '_' . $cultureKey);
		});*/

		/*
		 * Проверка на наличие положительного ответа сервера
		 * $input - УРЛ
		 */
		/*$fenom->addModifier('get_headers', function ($input)
		{
			$urlHeaders = @get_headers($input);
			if($urlHeaders[0] && strpos($urlHeaders[0], '200'))
			{
				return 200;
			}
			else if($urlHeaders[0] && !strpos($urlHeaders[0], '200'))
			{
				return 0;
			}
			else
			{
				return 1;
			}
		});*/

		//- Преобразует строки в массив данных
		/*$fenom->addModifier('str_array', function ($input)
		{
			$order = array("\r\n", "\n", "\r");

			$content1 = str_replace($order, ',', $input);
			return explode(',', $content1);
		});*/

		//- Формируем description из текста
		/*$fenom->addModifier('str_desc', function ($input)
		{
			$order = array(".", "?", "!", ";");

			$input = str_replace('&nbsp;', ' ', $input);
			$content1 = str_replace($order, '#', $input);
			$textarr = explode('#', $content1);

			if (iconv_strlen($textarr[0]) > 80)
			{
				return trim($textarr[0]) . '.';
			}

			return trim($textarr[0]) . '. ' . trim($textarr[1]) . '.' ;
		});*/

		//- Заполняем теги alt автоматом
		/*$fenom->addModifier('content_altauto', function ($input, $txt)
		{
			if (!$input) return $input;

			$imgs = array();
			$img = '~<img[^>]+>~i';

			// Если есть теги изображения
			if (!empty(preg_match_all($img, $input, $imgs, PREG_PATTERN_ORDER)))
			{
				// Идем последовательно по тегам
				$alt_value = $txt;
				foreach ($imgs[0] as $key => $img)
				{
					// Ищем атрибуты
					$alt = preg_match('~alt="(.*?)"~u', $img, $alts);
					$src = preg_match('~src="(.*?)"~u', $img, $srcs);

					// Если одно изображение номер не дописываем
					if ($key > 0) $alt_value = 'Photo ' . $key . ' — ' . $txt;

					if (empty($alts[0]))
					{
						// Если нет тега АЛТ добавляем и дописываем значение из второго параметра
						$img = preg_replace('~src="(.*?)"~u', 'src="' . $srcs[1] . '" alt="' . $alt_value . '"', $img);
					}
					else if ($alts[0] == 'alt=""' || $alts[0] == 'alt=" "')
					{
						// Если есть АЛТ, но он пустой
						$img = preg_replace('~alt="(.*?)"~u', 'alt="' . $alt_value . '"', $img);
					}

					$input = str_replace($imgs[0][$key], $img, $input);
				}
			}

			return $input;

		});*/

		//- Подменяем системные настройки
		/*$fenom->addModifier('option_set', function ($input, $param = '') use ($modx)
		{
			if (!$input) return $input;

			$modx->setOption($input, $param);

			return $modx->getOption($input);
		});*/

		//- Finds the Name of a given TV by name
		//- Находит Название заданного по имени TV
		/*$fenom->addModifier('tvcaption', function ($velue) use ($modx)
		{
			$pdoFetch = $modx->getService('pdoFetch');

			if (!$arr = $pdoFetch->getArray('modTemplateVar', array(
				'name' => $velue
			)))
			{
				$modx->log(modX::LOG_LEVEL_ERROR, print_r(array(
					'source' => 'Modifier[tvcaption]',
					'message' => 'Ошибка получения объекта',
					'name' => $velue
				), 1));
				return $velue;
			}

			return $arr['caption'];
		});*/

		//- Получение настройки указанного контекста
		/*$fenom->addModifier('optioncontext', function ($input, $param) use ($modx)
		{
			return $modx->getContext($param)->getOption($input);
		});*/

		//- Получение перевода любого текста из своего словаря
		/*$fenom->addModifier('getlexvalue', function ($input, $topic = 'default', $key = false) use ($modx)
		{
			if (!$input || !$input[0]) return;

			// Проверка на текущий контекст и целевой контекст
			if ((!$key && $modx->context->key == 'web') || ($key == 'web' && $modx->context->key == 'mgr')) return $input;

			// Если не задан контекст присваиваем текущий
			$key = $key ? : $modx->context->key;

			// Получаем язык контекста по умолчанию
			$lang_default = $modx->getContext('web')->getOption('cultureKey');

			$topics = explode(",", $topic);

			$topic_arr_sum = array();

			foreach($topics as $topic_item)
			{
				// Загружаем требуемый лексикон языка по умолчанию
				$modx->lexicon->load($lang_default . ':lexiconart:' . $topic_item);

				// Получаем массив значений требуемого лексикона с языкком по умолчанию
				$topic_arr = $modx->lexicon->getFileTopic($lang_default, 'lexiconart', $topic_item);

				if (!$topic_arr)
				{
					$modx->log(modX::LOG_LEVEL_ERROR,"Нет такого языкового файла: ${lang_default}:lexiconart:${topic_item}");
					continue;
					//return $input;
				}
				// Слияние массивов разных топиков
				$topic_arr_sum = array_merge($topic_arr_sum, $topic_arr);
			}

			$name = '';

			// Если вхождение массив, например, как опции
			if (is_array($input))
			{
				$name = array();

				foreach($input as $k=>$in)
				{
					// Проверяем каждое вхождение на присутствие в лексиконе
					foreach($topic_arr_sum as $keyarr=>$value)
					{
						if ($value == $in)
						{
							// Формируем массив ключей лексикона для дальнейшего перевода
							$name[$k] = $keyarr;

							break;
						}
					}

					if (!$name[$k])
					{
						// Получаем объект записи лексикона в базе данных
						if ($arr_obj_entrydb = $modx->getObject('modLexiconEntry', array(
							'value' => $in,
							'namespace' => 'lexiconart',
							'language' => $lang_default
						)))
						{
							$name[$k] = $arr_obj_entrydb->get('name');
						}
						else
						{
							$name[$k] = false;

							$modx->log(modX::LOG_LEVEL_ERROR,"Нет такого ключа для вхождения \"${in}\" в файле лексикона: ${lang_default}:lexiconart:${topic}");
						}
					}
				}
			}
			else
			{
				// Проверяем вхождение на присутствие в лексиконе
				foreach($topic_arr_sum as $keyarr=>$value)
				{
					if ($value == $input)
					{
						// Достаём ключ лексикона для дальнейшего перевода
						$name = $keyarr;

						break;
					}
				}
			}

			if (!$name)
			{
				// Если не получено ни одного ключа
				$modx->log(modX::LOG_LEVEL_ERROR,'Нет ключа в файле лексикона: ' . $lang_default . ':lexiconart:' . $topic);
				return $input;
			}

			// Получаем язык текущего контекста
			$lang = $modx->getContext($key)->getOption('cultureKey');

			foreach($topics as $topic_item)
			{
				// Загружаем конкретный лексикон этого языка
				$modx->lexicon->load($lang . ':lexiconart:' . $topic_item);
			}

			// Если несколько ключей в массиве
			if (is_array($name))
			{
				$output = array();

				foreach($name as $i=>$item)
				{
					if ($item)
					{
						// Получаем перевод по ключу
						$output[] = $modx->lexicon($item, array(), $lang);
					}
					else
					{
						$output[] = $input[$i];
					}
				}
			}
			else
			{
				// Получаем перевод по ключу
				$output = $modx->lexicon($name, array(), $lang);
			}

			return $output ? : $input;
		});*/

		//- Обрезка по количеству символов, сохраняя теги
		//- http://qaru.site/questions/149343/using-php-substr-and-striptags-while-retaining-formatting-and-without-breaking-html
		/*$fenom->addModifier('truncatenotag', function ($input, $param, $considerHtml = false, $ending = '...', $exact = true) use ($modx)
		{
			if (is_array($ending)) extract($ending);

			if ($considerHtml)
			{
				if (mb_strlen(preg_replace('/<.*?>/', '', $input)) <= $param) return $input;

				$totalLength = mb_strlen($ending);
				$openTags = array();
				$truncate = '';

				preg_match_all('/(<\/?([\w+]+)[^>]*>)?([^<>]*)/', $input, $tags, PREG_SET_ORDER);

				foreach ($tags as $tag)
				{
					if (!preg_match('/img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param/s', $tag[2]))
					{
						if (preg_match('/<[\w]+[^>]*>/s', $tag[0]))
						{
							array_unshift($openTags, $tag[2]);
						}
						else if (preg_match('/<\/([\w]+)[^>]*>/s', $tag[0], $closeTag))
						{
							$pos = array_search($closeTag[1], $openTags);

							if ($pos !== false)
							{
								array_splice($openTags, $pos, 1);
							}
						}
					}

					$truncate .= $tag[1];

					$contentLength = mb_strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $tag[3]));

					if ($contentLength + $totalLength > $param)
					{
						$left = $param - $totalLength;
						$entitiesLength = 0;

						if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $tag[3], $entities, PREG_OFFSET_CAPTURE))
						{
							foreach ($entities[0] as $entity)
							{
								if ($entity[1] + 1 - $entitiesLength <= $left)
								{
									$left--;
									$entitiesLength += mb_strlen($entity[0]);
								}
								else break;
							}
						}

						$truncate .= mb_substr($tag[3], 0 , $left + $entitiesLength);

						break;

					}
					else
					{
						$truncate .= $tag[3];
						$totalLength += $contentLength;
					}

					if ($totalLength >= $param) break;
				}
			}
			else
			{
				if (mb_strlen($input) <= $param)
				{
					return $input;
				}
				else
				{
					$truncate = mb_substr($input, 0, $param - strlen($ending));
				}
			}

			if (!$exact)
			{
				$spacepos = mb_strrpos($truncate, ' ');

				if (isset($spacepos))
				{
					if ($considerHtml)
					{
						$bits = mb_substr($truncate, $spacepos);
						preg_match_all('/<\/([a-z]+)>/', $bits, $droppedTags, PREG_SET_ORDER);

						if (!empty($droppedTags))
						{
							foreach ($droppedTags as $closingTag)
							{
								if (!in_array($closingTag[1], $openTags))
								{
									array_unshift($openTags, $closingTag[1]);
								}
							}
						}
					}
					$truncate = mb_substr($truncate, 0, $spacepos);
				}
			}

			$truncate .= $ending;

			if ($considerHtml)
			{
				foreach ($openTags as $tag)
				{
					$truncate .= '</'.$tag.'>';
				}
			}

			return $truncate;
		});*/

        break;
}