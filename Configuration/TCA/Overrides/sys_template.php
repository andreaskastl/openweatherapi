<?php
declare(strict_types=1);

defined('TYPO3') or die();

// add static typoscript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'openweatherapi',
    'Configuration/TypoScript',
    'Openweather API - Weather Forecast'
);
