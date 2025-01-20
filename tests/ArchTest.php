<?php

if (function_exists('arch')) {
    arch('it will not use debugging functions')
        ->expect(['dd', 'dump', 'ray'])
        ->each->not->toBeUsed();
} else {
    // before pest 3.0.0 arch() was called test()->group('arch') .. it probably still works but whatever

    test()
        ->group('arch')
        ->expect(['dd', 'dump', 'ray'])
        ->each->not->toBeUsed();
}

if (class_exists('Pest\Preset')) {
    // implemented on pest 3.7.2

    arch('it will comply with php preset')
        ->preset()
        ->php();

    arch('it will comply with laravel preset')
        ->preset()
        ->laravel();

    arch('it will comply with security preset')
        ->preset()
        ->security()->ignoring('md5');
}


