<?php

/**
 * Extension Manager/Repository config file for ext: "openweatherapi"
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 */
$EM_CONF[$_EXTKEY] = array(
    'title' => 'Openweather API',
    'description' => 'Displays weather forecast for a selected location in frontend based on wetter.com openweather API.',
    'category' => 'plugin',
    'author' => 'Andreas Kastl',
    'author_email' => 'typo3@andreaskastl.de',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '5.0.0',
    'constraints' => [
        'depends' => [
            'php' => '8.0.0-8.3.99',
            'typo3' => '12.4.0-13.9.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
);
