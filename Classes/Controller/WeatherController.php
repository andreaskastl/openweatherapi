<?php
declare(strict_types = 1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace AndreasKastl\Openweatherapi\Controller;

use TYPO3\CMS\Core\Http\RequestFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/**
 * Weather Controller to fetch data from api.wetter.com and assign result to view
 */
class WeatherController extends ActionController
{

    /**
     * Show action
     *
     * @return string The rendered HTML string
     */
    public function showAction()
    {
        // assign settings from flexform and typoscript to view
        $this->view->assign('settings', $this->settings);

        // prepare url
        $url = $this->settings['apiUrl'] . '/city/';
        $url .=	$this->settings['cityCode'] . '/project/';
        $url .= $this->settings['projectName'] . '/cs/';
        $url .= md5($this->settings['projectName'] . $this->settings['apiKey'] . $this->settings['cityCode']);
    
        // validate url
        if (!GeneralUtility::isValidUrl($url)) {

            // invalid url
            $this->addFlashMessage(
                LocalizationUtility::translate('error.url', 'openweatherapi') . ' ' . $url
            );
            return;
        }

        // get data from openweather API service
        $response = GeneralUtility::makeInstance(RequestFactory::class)->request($url);

        if ($response->getStatusCode() === 200) {

            // extract xml data from response
            $xmlObject = simplexml_load_string($response->getBody()->getContents());

            if (!$xmlObject->forecast) {

                // invalid xml object
                $this->addFlashMessage(
                    LocalizationUtility::translate('error.xmlDataMissing', 'openweatherapi')
                );
                return;
            } else {

                // valid object - convert to array before rendering the view
                $this->view->assign('api', (array) $xmlObject);
            }
        } else {

            // broken request / remote file not found
            $this->addFlashMessage(
                LocalizationUtility::translate('error.xmlNotFetched', 'openweatherapi')
            );
            return;
        }
    }
}
