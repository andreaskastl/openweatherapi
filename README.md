# Typo3 Extension `openweatherapi`
## Introduction
Displays weather forecast for a selected location in frontend based on api.wetter.com (openweather API).

**Please note:** 
- This extension is based on the free **XML API** that was/is provided by api.wetter.com directly.
- Wetter.com does not offer the XML API to new customers. The admin interface on the website is not available any more. The API endpoints seem to be still active for existing subscriptions.
- As announced here https://www.wetter.com/apps_und_mehr/website/api/ (12/2020): wetter.com offers a new REST API via Rapid API. This extension does not support this new REST API yet.

## Administration
### Installation
The extension needs to be installed as any other extension of TYPO3 CMS. Get the extension
1. **Get it from the Extension Manager:** Press the _Retrieve/Update_ button and search for the extension key `openweatherapi` and import the extension from the repository.
2. **Get it from typo3.org:** You can always get current version from https://extensions.typo3.org/extension/openweatherapi/ by downloading either the t3x or zip version. Upload the file afterwards in the Extension Manager.

The extension ships some TypoScript code which needs to be included and configured.
1. Switch to the root page of your site.
2. Switch to the **Template module** and select _Info/Modify_.
3. Press the link **Edit the whole template record** and switch to the tab _Includes_.
4. Select **Openweather API - Weather Forecast** at the field _Include static (from extensions)_.   

## Users Manual
### Creating a Plugin Content Element
To show the weather forecast on a page:
1. Switch to the **Page view module**
2. Create a new page or select an existing page
3. Create a **new content element** and in the _“new content element wizard”_ scroll down to the _plugins_ section and select _“Weather Forecast”_
4. Switch to the **Plugin** tab, and enter the required fields based on your wetter.com API subscription:
   1. Project Name 
   2. API Key
   3. City Code
6. **Save** the new plugin configuration.
7. Switch to the frontend and validate if the plugin is working correctly.

Please note: 
- When you open the frontend page with the plugin for the first time or after a change on the page, the API call to wetter.com is performed and data is fetched.
- When you or another user loads the same page again, the API call is not performed again, since the content is already cached in Typo3 CMS.
- The API will be called again after page cache expired (e.g. after 24 h). You can finetune the caching behaviour and API reloads. Edit the page record and switch to _"Behaviour"_ tab. Select the proper setting in field _"Caching/Cache lifetime"_

## Configuration
### Custom Templates
To customize the frontend output, define your own template and overwrite the template path in the constants section of the template module: `plugin.tx_openweatherapi.view.templateRootPath`

To customize date / time formats, overwrite the Typoscript setting in the setup section of the template module: `plugin.tx_openweatherapi.settings.strftime = %A, %d.%m.%Y`
