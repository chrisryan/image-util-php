<?php

require_once __DIR__ . '/vendor/autoload.php';

use TraderInteractive\Util\Image;

$imageFile = __DIR__ . '/tests/_files/portrait.jpg';

$imagick = new Imagick();
$imagick->readImage($imageFile);

$thumbnails = [
    ['width' => 1024, 'height' => 768, 'quality' => 70, 'bestfit' => true, 'upsize' => true, 'blurBackground' => true, 'blurValue' => 100.0],
    ['width' => 96, 'height' => 72, 'quality' => 60, 'bestfit' => true, 'upsize' => true, 'blurBackground' => true, 'blurValue' => 100.0],
    ['width' => 512, 'height' => 384, 'quality' => 60, 'bestfit' => true, 'upsize' => true, 'blurBackground' => true, 'blurValue' => 100.0],
    ['width' => 180, 'height' => 135, 'bestfit' => true, 'upsize' => true, 'blurBackground' => true, 'blurValue' => 100.0],
];

foreach ($thumbnails as $thumbnail) {
    $boxWidth = $thumbnail['width'];
    $boxHeight = $thumbnail['height'];

    $resized = Image::resize($imagick, $boxWidth, $boxHeight, $thumbnail);

    $resized->writeImage(__DIR__ . "/resized-{$boxWidth}x{$boxHeight}.jpg");
}



