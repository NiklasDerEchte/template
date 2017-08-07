<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07.08.17
 * Time: 14:53
 */

namespace Niklas\Template;

ini_set("display_errors",1);
require __DIR__ . "/../vendor/autoload.php";

$template = new Template("testIndex.html");

$template->set("title", "Hello");

$template->assign(["test"=>"foo", "test2"=>"bar"]);

echo $template->render();