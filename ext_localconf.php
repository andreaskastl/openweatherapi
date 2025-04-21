<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use AndreasKastl\Openweatherapi\Controller\WeatherController;

defined('TYPO3') or die();

// Configure plugin
ExtensionUtility::configurePlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'Openweatherapi',
    // arbitrary, but unique plugin name (not visible in the backend)
    'Weather',
    // all actions
    [WeatherController::class => 'show'],
    // non-cacheable actions
    [],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT,
);