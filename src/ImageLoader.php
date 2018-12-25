<?php

namespace Hexa\Image;
use Exception;

class ImageLoader {
	    /**
     * Directory where image will be saved
     *
     * @var string
     */
    private $pathToDownload;

        /**
     * Construct method
     *
     * @param string $saveToPath (optional)
     */
    public function __construct(string $pathToDownload = '')
    {
        $this->pathToDownload = $pathToDownload;
    }

    public function get_image($url)
    {
        $url = trim($url);
        $ex = explode('/', $url);
        $l = count($ex);
        $filename = $ex[$l - 1];
        $ex = explode(".", $filename);
        if (count($ex) < 2)
            throw new badFileExtensionException("bad image file");;
        $extension = strtolower($ex[1]);
        $image_extensions = ["jpg", "jpeg", "gif", 'png'];
        if (!in_array($extension, $image_extensions))
            throw new badFileExtensionException("bad image file");
        @$f = file_get_contents($url);
        if (!$f) {
            throw new remoteFileNotFoundException("image $url can not be found");
        }
        $folder = "img/";
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }
        file_put_contents($folder . $filename, $f);
        return true;
    }
}