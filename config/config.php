<?php
/**
 * Файл настроек.
*/

// Константы для обращения к контроллерам.
const PathPrefix = '../controllers/';
const PathPostfix = 'Controller.php';

// Шаблонизатор Smarty
$template = 'default';

// Пути к файлам шаблонов (*tpl)
 define('TemplatePrefix', "../views/$template/");
const TemplatePostfix = '.tpl';

 // Пути к файлам шаблонов в вебпространстве
define('TemplateWebPath', "/templates/$template/");

require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/templates_c');
$smarty->setCacheDir('../tmp/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath', TemplateWebPath);
