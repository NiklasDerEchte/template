# template
Simple html template

## Example
```php
$template = new Template("testIndex.html");

echo "Content is below the NewFile, becouse the maincontent tags (%%)";

$template->set("title", "Hello");
$template->assign(["test"=>"search","test2"=>"And", "test3"=>"Replace"]);
$template->append("newFile", "testSite.html");

echo $template->render();
```

## Install

Niklas/Template is available at packagist.org

install it using composer:

```
composer require niklas/template
```
