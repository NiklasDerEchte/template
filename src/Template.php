<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07.08.17
 * Time: 14:22
 */

namespace Niklas\Template;

class template
{
    private $mFileContent;
    private $mSAR = [];

    public function __construct($file)
    {
        if(!$this->mFileContent = file_get_contents($file)) {
            throw new Exception("File not found!");
        }
        ob_start();
    }

    public function set($name, $content) {
        $search = "%$name%";
        $this->mSAR[$search] = $content;
    }

    public function assign (array $values) {
        foreach($values as $key => $value) {
            $search = "%$key%";
            $this->mSAR[$search] = $value;
        }
    }

    public function render() {
        $newContent = ob_get_contents();
        ob_clean();

        foreach($this->mSAR as $key => $value) {
            $newFileContent = str_replace($key, $value, $this->mFileContent);
            $this->mFileContent = $newFileContent;
        }
        $finalContent = str_replace("%%", $newContent ,$this->mFileContent);
        return $finalContent;

    }

}