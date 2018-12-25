<?php

namespace Hexa\Image\Tests;

use \PHPUnit\Framework\TestCase;
use Hexa\Image\ImageLoader;

class ImageLoaderTest extends TestCase
{
    public function testIsPhpUnitConfigured()
    {
        $this->assertTrue(True);
    }
    public function testImageLoaderCanBeCreated()
    {
        $ldr = new ImageLoader();
        $this->assertTrue(is_object($ldr));
    }
    public function testImageCanBeLoaded()
    {
        $ldr = new ImageLoader();
        $rez = $ldr->get_image('https://hexa.com.ua/wp-content/themes/hexa/images/girl.jpg');
        $this->assertTrue($rez);
    }
}