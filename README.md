# template
Simple html template

## Example
```php
<?php
$template = new Template("testIndex.html");
$template->set("title", "Hello");

echo "Test";

echo $template->render();
?>
```

## Install

Niklas/Template is available at packagist.org

install it using composer:

```
composer require niklas/template
```
