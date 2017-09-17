<?php
	class LANGUAGE 
	{
		public static $Error = "";

		private static $Message = array(
			'en' => array (
				'header' => 'Infinal',
				'home' => 'Home',
				'server' => 'Server',
				'ark' => 'ARK',
				'detail' => 'Details',
				'player' => 'Player',
				'mod' => 'Modifications',
				'minecraft' => 'Minecraft',
				'teamspeak' => 'Teamspeak',
				'about' => 'About us',
				'support' => 'Support',
				'email' => 'info@infinal.de',
				'address' => 'Gotlandwinkel 5, 24109 Kiel, Schleswig-Holstein, Deutschland',
				'imprint' => 'Impressum',
				'generalLink' => 'General Links',
				'infinalcraft' => 'Infinalcraft',
				'Infinalark' => 'Infinalark',
				'infinalspeak' => 'Infinalspeak',
				'portfolio' => 'Portfolio Aleksandr Alpatskov',
				'latestNews' => 'Lastest News',
				'facebook' => 'Facebook',				
				'copyright' => '&copy; 2016 - All Rights reserved INFINAL',
				'includeError' => 'does not exist.',
				'errorMessage1' => 'An error has occurred at ',
				'errorMessage2' => 'For more Information click here '
			),
			'de' => array (
				'header' => 'Infinal',
				'home' => 'Startseite',
				'server' => 'Server',
				'ark' => 'ARK',
				'detail' => 'Details',
				'player' => 'Spieler',
				'mod' => 'Modifikationen',
				'minecraft' => 'Minecraft',
				'teamspeak' => 'Teamspeak',
				'about' => 'Über uns',
				'support' => 'Support',
				'email' => 'info@infinal.de',
				'address' => 'Gotlandwinkel 5, 24109 Kiel, Schleswig-Holstein, Deutschland',
				'imprint' => 'Impressum',
				'generalLink' => 'Allgemeine Verlinkungen',
				'infinalcraft' => 'Infinalcraft',
				'Infinalark' => 'Infinalark',
				'infinalspeak' => 'Infinalspeak',
				'portfolio' => 'Portfolio Aleksandr Alpatskov',
				'latestNews' => 'Neuste Information',
				'facebook' => 'Facebook',
				'copyright' => '&copy; 2016 - Alle Rechte vorbehalten INFINAL',
				'includeError' => 'ist nicht vorhanden.',
				'errorMessage1' => 'Ein Fehler ist aufgetreten bei ',
				'errorMessage2' => 'Für mehr Informationen drücke hier '
			),
			'ru' => array (
				'header' => 'Инфинал',
				'home' => 'Дома',
				'server' => 'Сервер',
				'ark' => 'АРК',
				'detail' => 'Детали',
				'player' => 'Игрок',
				'mod' => 'Изменения',
				'minecraft' => 'Минекрафт',
				'teamspeak' => 'Теамспеак',
				'about' => 'Про Нас',
				'support' => 'Поддержка',
				'email' => 'Инфо@инфинал.де',
				'address' => 'Готландщинкел  5, 24109 киль, Шлезвиг-Гольштейн, Германия',
				'imprint' => 'Отпечаток',
				'generalLink' => 'Общие ссылки',
				'infinalcraft' => 'Инфиналцрафт',
				'Infinalark' => 'Инфиналарк',
				'infinalspeak' => 'Инфиналспеак',
				'portfolio' => 'Портфель Александр Алпатсков',
				'latestNews' => 'Последняя информация',
				'facebook' => 'Фацебоок',
				'copyright' => '&copy; 2016 - Все права защищены Инфинал',
				'includeError' => 'Не существует.',
				'errorMessage1' => 'Произошла ошибка в ',
				'errorMessage2' => 'Для получения дополнительной информации нажмите здесь '
			)
		);

		public static function msg($s)
		{
			$locale = $_SESSION['locale'];
			
			if(isset(self::$Message[$locale][$s]))
			{
				return self::$Message[$locale][$s];
			}
			else
			{
				self::$Error =  "Error: The variable: '$s' is not in the locale: "."$locale";
			}
		}
	}
?>