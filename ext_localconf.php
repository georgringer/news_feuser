<?php
defined('TYPO3_MODE') or die();

$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['classes']['Domain/Model/News'][] = 'news_feuser';
$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['classes']['Controller/NewsController'][] = 'news_feuser';

// Add new controller/action
$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['newItems']['News->perUser']
    = 'News of user';

// Extend the query
$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['Domain/Repository/AbstractDemandedRepository.php']['findDemanded']['News.php']
    = 'EXT:news_feuser/Classes/Hooks/AbstractDemandedRepository.php:GeorgRinger\\NewsFeuser\\Hooks\\AbstractDemandedRepository->modify';

// Update flexforms
$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['Hooks/BackendUtility.php']['updateFlexforms']['news_feuser']
    = 'GeorgRinger\\NewsFeuser\\Hooks\\BackendUtility->update';

$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['GeorgRinger\\News\\Hooks\\PageLayoutView']['extensionSummary']['news_feuser']
    = 'GeorgRinger\\NewsFeuser\\Hooks\\PageLayoutView->extensionSummary';
