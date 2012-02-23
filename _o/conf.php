<?php


$conf['app'] = array(
	'siteurl' => '', 
	//'root' => $_SERVER['DOCUMENT_ROOT'],
	'root' => '/Users/jagga/Sites/mxi/swarm/www',
	'secret' => '&xQwQ*NhB+ !0<PmJswIfP#O;M+#C`Bl>(ciy5:I,P3D_;=O|y~3PZQ=ZGG]&Pf',
	'track_users' => true,
	'prefix' => 'ots_',
	'controller' => 'main',
	'action' => 'index',
	'permalinks' => false,
	'debug' => true,
	'admin' => array('127.0.0.1'),
);

$conf['app']['core'] = $conf['app']['root'] . '/_o';

$conf['db'] = array(
	'host' => 'localhost',
	'name' => 'swarm',
	'user' => 'root',
	'pass' => 'root',
	'prefix' => $conf['app']['prefix'],
	'engine' => 'mysql',
	'encoding' => 'utf-8',
	'tables' => array()
);


$conf['dir'] = array(
	'views' => $conf['app']['core'] . '/_views',
	'models' => $conf['app']['core'] . '/_models',
	'controllers' => $conf['app']['core'] . '/_controllers',
	'libs' => $conf['app']['core'] . '/libs',
	'tools' => $conf['app']['core'] . '/tools',
	'tmp' => $conf['app']['core'] . '/tmp',
	'files' => $conf['app']['root'] . '/files'
);

$conf['dir']['cache'] = $conf['dir']['tmp'] . '/cache';


$conf['url'] = array(
	'files' => $conf['app']['siteurl'] . '/files'
);
