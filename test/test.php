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

$template = new Tpl("testIndex.html");

echo "Content is below the testSide, becouse the maincontent tags (%%)\n";
echo "%replaceMe%";

$template->set("title", "Hello");

$template->assign(["test"=>"search","test2"=>"And", "test3"=>"Replace"]);

$template->append("newFile", "testSide.html");

$template->replace(["replaceMe"=>"HELLO!"]);

echo $template->render();