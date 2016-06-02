<?php
defined('TYPO3_MODE') or die();

$fields = array(
    'tx_newsfeuser_user' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:news_feuser/Resources/Private/Language/locallang.xlf:tx_news_domain_model_news.tx_newsfeuser_user',
        'config' => array(
            'type' => 'group',
            'internal_type' => 'db',
            'allowed' => 'fe_users',
            'foreign_table' => 'fe_users',
            'size' => 1,
            'minitems' => 0,
            'maxitems' => 1010,
            'default' => 0,
            'wizards' => array(
                'suggest' => array(
                    'type' => 'suggest',
                    'default' => array(
                        'searchWholePhrase' => true
                    )
                ),
            ),
        )
    )
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $fields);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_news_domain_model_news', 'tx_newsfeuser_user', '', 'after:author');

