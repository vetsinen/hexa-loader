<?php

namespace Hexa\Image;

use Exception;
const image_extensions = ["jpg", "jpeg", "gif", "png"];

class ImageLoader
{
    /**
     * @param string $url
     * @param string $filename
     * @param string $path
     * @return void
     * @throws Exception
     */
    public function act(string $url, string $filename, string $path): void
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new Exception("Url is not valid!");
        }

        @$contents = file_get_contents($url);
        if (!$contents) {
            throw new Exception("image $url isn't valid or file is not available");
        }

        $parts = explode('.', $filename);
        if (count($parts) < 2 ||
            strlen($parts[0] === 0) ||
            !in_array(strtolower($parts[count($parts) - 1]), image_extensions)
        ) {
            throw new Exception('bad name for image file');
        };

        if (!file_exists($path)) {
            throw new Exception("proposed directory doesn't exists");
        }
        if (file_exists($path . $filename)) {
            throw new Exception('file $filename already exists');
        }
        try {
            file_put_contents($path . $filename, $contents);
        } catch (Exception $e) {
            throw new Exception("file $filename can not be saved");
        }
    }
}