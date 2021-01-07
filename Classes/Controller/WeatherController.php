<?php
namespace AndreasKastl\Openweatherapi\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Http\RequestFactory;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 - 2020 Andreas Kastl
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * WeatherController
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
    	// global settings
    	$requestTimeout = 10; 			// socket timeout in seconds
    	
    	// settings from flexform and typoscript
		$this->view->assign('settings', $this->settings);
    	
    	// prepare url
    	$url = $this->settings['apiUrl'] . '/city/' . $this->settings['cityCode'] . '/project/' . $this->settings['projectName'] . '/cs/' . md5($this->settings['projectName'] . $this->settings['apiKey'] . $this->settings['cityCode']);
    	
    	// validate url
		if (!GeneralUtility::isValidUrl($url)) {
			
			// invalid url
			$this->addFlashMessage(LocalizationUtility::translate('error.url','openweatherapi') . ' ' . $url);
			return;			
		}
		
		// get data from openweather API service
		$response = GeneralUtility::makeInstance(RequestFactory::class)->request($url);
		
		if ($response->getStatusCode() === 200) {

			// extract xml data from response
			$xmlObject = simplexml_load_string($response->getBody()->getContents());
			
			if (!$xmlObject->forecast) {

				// invalid xml object
				$this->addFlashMessage(LocalizationUtility::translate('error.xml_data_missing','openweatherapi'));
				return;
				
			} else {
						  	
				// valid object - convert to array before rendering the view
				$this->view->assign('api', (array) $xmlObject);				
			}
			
		} else {
			
    		// broken request / remote file not found
    		$this->addFlashMessage(LocalizationUtility::translate('error.xml_not_fetched','openweatherapi'));
    		return;
		}    
    }
}