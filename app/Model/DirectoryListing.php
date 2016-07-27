<?php

namespace App\Model;

class DirectoryListing {

    /**
     * @var string Directory you want to list ..
     */
    private $directoryToScan;

    /**
     * @var array list of directory files
     */
    private $files;

    /**
     * @var array list of directories in a directoryToScan
     */
    private $directories;

    public function __construct($directory)
    {
        $this->directoryToScan = $directory;
    }

    /**
     * Scan the directory and set the 'directories' and 'files' arrays in the object
     */
    protected function scan() {

        $items = array_slice(scandir($this->directoryToScan),2);

        foreach ($items as $item) {

            if (is_dir($this->directoryToScan.'/'.$item)) {
                $this->directories[] = [
                    'is_dir' => true,
                    'value' => $item,
                    'size' => 0
                ];
            } else {
                $this->files[] = [
                    'is_dir' => false,
                    'value' => $item,
                    'size' => (int)filesize($this->directoryToScan.'/'.$item)
                ];
            }
        }

    }

    /**
     * Presunut do inej classy
     * @param $bytes
     * @return float|int|string
     */
    public static function fileSizeConverter($bytes)
    {
        $result = 0;
        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach($arBytes as $arItem)
        {
            if($bytes >= $arItem["VALUE"])
            {
                $result = $bytes / $arItem["VALUE"];
                $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
                break;
            }
        }

        return $result;
    }

    /**
     * Parse the directory
     */
    public function getDirectoryContent()
    {
        $this->scan();
        return array_merge($this->directories, $this->files);
    }
    
}

?>