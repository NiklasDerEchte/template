<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07.08.17
 * Time: 14:22
 */

namespace Niklas\Template;

class Tpl
{
    private $mTemplate;
    private $mSAR = [];

    public function __construct($file)
    {
        if(!$this->mTemplate = file_get_contents($file)) {
            throw new \Exception("File not found!");
        }
        ob_start();
    }

    public function set($name, $content) {
        $this->mSAR[$name] = $content;
    }

    public function assign (array $values) {
        foreach($values as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function render() {
        $content = ob_get_contents();
        ob_clean();

        $template = preg_replace_callback("/\\%([a-z0-9]*)\\%/mi", function ($matches) use($content) {
            if($matches[1] === "") {
                return $content;
            }
            return $this->mSAR[$matches[1]];
        }, $this->mTemplate);

        return $template;

    }

}