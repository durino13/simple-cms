<?php

namespace App\Model\TinyMCE;


class TinyMCE
{

    protected $plugins;

    /**
     * This method will be called before the content of the Article is printed out. It will process all plugins ..
     */
    public function process()
    {
        foreach ($this->plugins as $plugin) {
            $plugin->execute();
        }
    }

}