<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use AndreasKastl\Openweatherapi\Controller\WeatherController;

defined('TYPO3') or die();

// configure plugins
ExtensionUtility::configurePlugin(
    'openweatherapi',
    'weather',
    [
        WeatherController::class => 'show'
    ],
    // non-cacheable actions
    [
    ]
);