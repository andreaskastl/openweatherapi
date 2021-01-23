<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        // add static typoscript
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            'openweatherapi',
            'Configuration/TypoScript',
            'Openweather API - Weather Forecast'
        );
    }
);
