<?php

namespace Hexa\Image\Tests;

use \PHPUnit\Framework\TestCase;
use Hexa\Image\ImageLoader;

class ImageLoaderTest extends TestCase
{
    /**
     * verifies that phpunit is configured ok
     */
    public function testIsPhpUnitConfigured()
    {
        $this->assertTrue(True);
    }

    /**
     * checks that ImageLoader object can be created
     */
    public function testImageLoaderCanBeCreated()
    {
        $ldr = new ImageLoader();
        $this->assertTrue(is_object($ldr));
    }

    /**
     * checks positive case when all data is valid
     * @throws \Exception
     */
    public function testImageCanBeLoaded()
    {
        $ldr = new ImageLoader();
        $path = "img/";
        $filename = "girl.jpg";
        mkdir($path);
        $ldr->act('https://hexa.com.ua/wp-content/themes/hexa/images/girl.jpg', $filename, $path);
        chdir($path);
        $this->assertTrue(file_exists($filename));
        unlink($filename);
        chdir('..');
        rmdir($path);
    }

    /**
     * checks negative case for non-existing image
     */
    public function testErrorWhenNoFile()
    {
        $ldr = new ImageLoader();
        $path = "img/";
        $filename = "boy.jpg";
        $this->expectException(\Exception::class);
        $ldr->act('https://hexa.com.ua/wp-content/themes/hexa/images/boy.jpg', $filename, $path);
    }
}