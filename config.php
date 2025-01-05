<?php

/**
 * Do not modify the default.config.php file, instead, override the settings in the config.php file
 */

$config = [
	'datetimeFormat' => 'm/d/Y g:i A',
	'quality' => 90,
	'defaultPermission' => 0775,

	'sources' => [
		'default' => [],
		// 'base' => [
		// 	'root' => __DIR__ . '/resources/base',
		// 	'baseurl' => '/assets/extra',
		// 	'createThumb' => true,
		// 	'thumbFolderName' => '_thumbs',
		// 	'extensions' => array('jpg', 'png', 'gif', 'jpeg'),
		// ],
	],

	'createThumb' => true,
	'thumbFolderName' => '_thumbs',
	'excludeDirectoryNames' => ['.tmb', '.quarantine'],
	'maxFileSize' => '8mb',

	'allowCrossOrigin' => false,
	'allowReplaceSourceFile' => true,

	// 'baseurl' => ((isset($_SERVER['HTTPS']) and $_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . '/',
	// 'baseurl' => ((isset($_SERVER['HTTPS']) and $_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . '/' . $_SERVER['HTTP_X_WEBSLAB_PROJECT'],
	'baseurl' => "/$_SERVER[HTTP_X_WEBSLAB_PROJECT]/",
	'root' => __DIR__ . "/resources/$_SERVER[HTTP_X_WEBSLAB_PROJECT]/",
	'extensions' => [
		'webp',
		'jpg',
		'png',
		'gif',
		'jpeg',
		'ico',
		'jpeg',
		'svg',
		'ttf',
		'tif',
		'txt',
		'zip',
		'rar',
		'7z',
		'gz',
		'tar',
		'pps',
		'ppt',
		'pptx',
		'odp',
		'xls',
		'xlsx',
		'csv',
		'doc',
		'docx',
		'pdf',
		'rtf'
	],
	'imageExtensions' => ['jpg', 'png', 'gif', 'jpeg', 'webp'],

	'debug' => JODIT_DEBUG,
	'accessControl' => [],
	"pdf" => [
		"defaultFont" => "serif",
		"isRemoteEnabled" => true,
		"paper" => [
			'format' => 'A4',
			'page_orientation' => 'portrait',
		]
	]
];


$config['roleSessionVar'] = 'JoditUserRole';

$config['accessControl'][] = array(
	'role'                => '*',

	'extensions'          => '*',
	// 'path'                => '/',
	'path'                => '/' . $_SERVER['HTTP_X_WEBSLAB_PROJECT'],

	'FILES'               => true,
	'FILE_MOVE'           => true,
	'FILE_UPLOAD'         => true,
	'FILE_UPLOAD_REMOTE'  => true,
	'FILE_REMOVE'         => true,
	'FILE_RENAME'         => true,

	'FOLDERS'             => true,
	'FOLDER_MOVE'         => true,
	'FOLDER_REMOVE'       => true,
	'FOLDER_RENAME'       => true,

	'IMAGE_RESIZE'        => true,
	'IMAGE_CROP'          => true,
);

$config['accessControl'][] = array(
	'role'                => '*',

	'extensions'          => 'exe,bat,com,sh,swf',

	'FILE_MOVE'           => false,
	'FILE_UPLOAD'         => false,
	'FILE_UPLOAD_REMOTE'  => false,
	'FILE_RENAME'         => false,
);

return $config;
