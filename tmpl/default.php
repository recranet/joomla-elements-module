<?php

/**
 * @copyright Recranet B.V. 2020
 */

defined('_JEXEC') or die;

$accommodationView = (string) $params->get('accommodationsView');
$modules = (string) $params->get('module');
$baseUrl = (string) $params->get('baseUrl');
$packageSpecificationCategory = (int) $params->get('packageSpecificationCategory');
$reviewsSummaryElementStyle = (string) $params->get('reviewsSummaryElementStyle');

switch ($modules) {
    case 'accommodations':
        echo '<recranet-accommodations class="recranet-element" ' . ($accommodationView == 'cards' ? 'layoutType="cards"' : '') . ($baseUrl ? 'baseUrl="' . $baseUrl . '"' : '') . ' ></recranet-accommodations>';
        break;
    case 'search-bar':
        echo '<recranet-search-bar class="recranet-element" formAction="' . ($baseUrl ? $baseUrl : '/') . '"></recranet-search-bar>';
        break;
    case 'map':
        echo '<recranet-map class="recranet-element" baseUrl="' . ($baseUrl ? $baseUrl : '/') . '"></recranet-map>';
        break;
    case 'featured-accommodations':
        echo '<recranet-featured-accommodations class="recranet-element" baseUrl="' . ($baseUrl ? $baseUrl : '/') . '"></recranet-featured-accommodations>';
        break;
    case 'packages':
        echo '<recranet-packages class="recranet-element" baseUrl="' . ($baseUrl ? $baseUrl : '/') . '" ' . ($packageSpecificationCategory ? 'packageSpecificationCategory="' . $packageSpecificationCategory . '"' : '') . '></recranet-packages>';
        break;
    case 'reviews-summary':
        echo '<recranet-reviews-summary class="recranet-element" elementStyle="' . ($reviewsSummaryElementStyle ? $reviewsSummaryElementStyle : 'default') . '"></recranet-reviews-summary>';
        break;
    case 'reviews-panel':
        echo '<recranet-reviews-panel class="recranet-element" baseUrl="' . ($baseUrl ? $baseUrl : '/') . '"></recranet-reviews-panel>';
        break;
    default:
        echo 'Error: Module not found';
        break;
}
    
