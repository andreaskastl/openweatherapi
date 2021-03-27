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
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '3.1.2',
    'constraints' => [
    'depends' => [
        'php' => '7.3.0-7.4.99',        
        'typo3' => '10.4.14-10.4.99',
    ],
    'conflicts' => [],
    'suggests' => [],
    ],
);
