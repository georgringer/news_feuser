<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'FE User for EXT:news',
    'description' => 'Extend news by a relation to a FE User',
    'category' => 'fe',
    'author' => 'Georg Ringer',
    'author_email' => 'mail@ringer.it',
    'shy' => '',
    'dependencies' => '',
    'conflicts' => '',
    'priority' => '',
    'module' => '',
    'state' => 'stable',
    'internal' => '',
    'modify_tables' => 'tx_news_domain_model_news',
    'clearCacheOnLoad' => 1,
    'lockType' => '',
    'author_company' => 'ringer.it',
    'version' => '1.0.2',
    'constraints' => array(
        'depends' => array(
            'typo3' => '6.2.10-8.2.99',
            'news' => '3.2.5-4.9.99'
        ),
        'conflicts' => array(),
        'suggests' => array(),
    ),
    'suggests' => array(),
);
