<?php

defined('TYPO3_MODE') || die('Access denied.');

// register plugin
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'openweatherapi',
    'weather',
    'Openweather API - Weather Forecast'
);

// add flexform
$pluginSignature = 'openweatherapi_weather';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:openweatherapi/Configuration/FlexForms/Registration.xml'
);
