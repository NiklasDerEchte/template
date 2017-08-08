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
    private $mFileContent;
    private $mSAR = [];
    private $mReplace = [];

    public function __construct($file)
    {
        if(!$this->mFileContent = file_get_contents($file)) {
            throw new \Exception("File not found!");
        }
        ob_start();
    }

    public function set($name, $content) {
        $search = "%$name%";
        $this->mSAR[$search] = $content;
    }

    public function assign (array $values) {
        foreach($values as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function append($name, $file) {
        if(!$fileContent = file_get_contents($file)) {
            throw new \Exception("File not found!");
        }
        $this->set($name, $fileContent);
    }

    public function replace(array $values) {
        foreach($values as $key => $value) {
            $this->mReplace["%$key%"] = "$value";
        }
    }

    public function render() {
        $newContent = ob_get_contents();
        ob_clean();

        foreach ($this->mReplace as $key => $value) {
            $tempContent = str_replace($key, $value, $newContent);
            $newContent = $tempContent;
        }

        foreach($this->mSAR as $key => $value) {
            $newFileContent = str_replace($key, $value, $this->mFileContent);
            $this->mFileContent = $newFileContent;
        }
        $finalContent = str_replace("%%", $newContent ,$this->mFileContent);
        return $finalContent;

    }

}