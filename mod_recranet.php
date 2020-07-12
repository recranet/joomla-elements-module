<?php

/**
 * @package     Joomla.Site
 * @subpackage  mod_recranet
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$recranetConfig = array(
    'organization' => (int) $params->get('organization'),
    'locale' => (string) $params->get('locale'),
    'currency' => (string) $params->get('currency'),
    'googleApiKey' => (string) $params->get('googleApiKey'),
);

if ($params->get('accommodationCategory') !== null) {
    $recranetConfig['accommodationParams']['accommodationCategory'] = (int) $params->get('accommodationCategory');
}

if ($params->get('localityCategory') !== null) {
    $recranetConfig['accommodationParams']['localityCategory'] = (int) $params->get('localityCategory');
}

$document = JFactory::getDocument();
$document->addStylesheet(JUri::base() . 'modules/mod_recranet/css/mod_recranet.css');

// Set base URL for Angular HTML5 Mode routing
$language = JFactory::getLanguage()->getTag();
$activeMenuItem = JFactory::getApplication()->getMenu()->getActive($language);
$document->setBase(JRoute::_($activeMenuItem->link));

// Add SDK loader to head
if ($params->get('sdk')) {
    // Create random string
    $date = new DateTime();
    $randomString = $date->format('U') . "=" . $date->format('U');

    // Set script tag
    $scriptHtml = "" .
        "<script type='text/javascript'>" . PHP_EOL .
        "   window.recranetConfig = %s;" . PHP_EOL .
        "</script>" . PHP_EOL .
        "<script src='https://static.recranet.com/elements/sdk-%s/sdk.js?%s' type='text/javascript' async></script>";

    // Add javascript tag to dom
    $document->addCustomTag(vsprintf($scriptHtml, [json_encode($recranetConfig), (string) $params->get('locale'), $randomString]));
}

require JModuleHelper::getLayoutPath('mod_recranet', $params->get('layout', 'default'));
