<?php
declare(strict_types=1);

defined('TYPO3') or die();

(static function (): void {

    // register plugin
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'openweatherapi',
        'weather',
        'Openweather API - Weather Forecast',
        'openweatherapi-weather'
    );

    // add flexform
    $pluginSignature = 'openweatherapi_weather';
    $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        $pluginSignature,
        'FILE:EXT:openweatherapi/Configuration/FlexForms/Registration.xml'
    );

})();