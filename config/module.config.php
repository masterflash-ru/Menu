<?php
/**
генератор меню
 */

namespace Mf\Menu;


return [
	/*конфиг по умолчанию, создайте аналогичный ключ в глобальном конфиге с нужными типами меню*/
	"menu"=>[
	],

    'view_helpers' => [
        'factories' => [
            View\Helper\Menu::class => View\Helper\Factory\Menu::class,
        ],
        'aliases' => [
            'Menu' => View\Helper\Menu::class,
			'menu' => View\Helper\Menu::class,
			
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

];
