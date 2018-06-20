<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'FE User for EXT:news',
    'description' => 'Extend news by a relation to a FE User',
    'category' => 'fe',
    'author' => 'Georg Ringer',
    'author_email' => 'mail@ringer.it',
    'state' => 'stable',
    'modify_tables' => 'tx_news_domain_model_news',
    'clearCacheOnLoad' => 1,
    'author_company' => 'ringer.it',
    'version' => '2.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.9.99',
            'news' => '6.0.0-7.9.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'suggests' => [],
];
