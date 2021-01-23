<?php

defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        // configure plugins
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'openweatherapi',
            'weather',
            [
        \AndreasKastl\Openweatherapi\Controller\WeatherController::class => 'show'
        ],
        // non-cacheable actions
        [
        ]
        );

        // register wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:openweatherapi/Configuration/TsConfig/Page/Mod/Wizards/NewContentElement.tsconfig">'
        );

        // register icons
        $icons = [
    'openweatherapi-weather' => 'Extension.svg',
    ];
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        foreach ($icons as $identifier => $path) {
            $iconRegistry->registerIcon(
                $identifier,
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => 'EXT:openweatherapi/Resources/Public/Icons/' . $path]
            );
        }
    }
);
