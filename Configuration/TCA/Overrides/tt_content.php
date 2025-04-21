<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

// Register plugin
$pluginKey = ExtensionUtility::registerPlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'Openweatherapi',
    // arbitrary, but unique plugin name (not visible in the backend)
    'Weather',
    // plugin title, as visible in the drop-down in the backend, use "LLL:" for localization
    'LLL:EXT:openweatherapi/Resources/Private/Language/locallang.xlf:extension.name',
    // icon identifier
    'openweatherapi-weather',
    'plugins',
    // plugin description
    'LLL:EXT:openweatherapi/Resources/Private/Language/locallang.xlf:extension.description',
);

// Add flexform
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:openweatherapi/Configuration/FlexForms/Registration.xml',
    $pluginKey
);

// Add the FlexForm to the show item list
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;LLL:EXT:openweatherapi/Resources/Private/Language/locallang.xlf:flexform.settings.title, pi_flexform',
    $pluginKey,
    'after:palette:headers'
);