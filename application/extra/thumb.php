<?php
/**
 * image thumb config
**/

return [
	'size'=>[
		'100_100',
		'180_180',
		'350_350',
		'350_400',
		'350_450',
		'500_500',
	],
    'path' => SERVER_URL . INPUT_PATH . '/storage/cache',
	'save_path' => ROOT_PATH . 'storage' . DS . 'cache',
];
