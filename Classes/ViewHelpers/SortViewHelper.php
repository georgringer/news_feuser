<?php

namespace GeorgRinger\NewsFeuser\ViewHelpers;

use TYPO3\CMS\Core\Database\DatabaseConnection;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

class SortViewHelper extends AbstractViewHelper
{

    /**
     * @var bool
     */
    protected $escapeOutput = false;

    /**
     */
    public function initializeArguments()
    {
        $this->registerArgument('user', ObjectStorage::class, 'list of users', true);
        $this->registerArgument('as', 'string', 'Output variable', true);
        $this->registerArgument('id', 'int', 'If of news news', true);
    }

    public function render()
    {
        /** @var DatabaseConnection $db */
        $db = $GLOBALS['TYPO3_DB'];
        $row = $db->exec_SELECTgetSingleRow(
            'tx_newsfeuser_user',
            'tx_news_domain_model_news',
            'deleted=0 AND uid=' . (int)$this->arguments['id']
        );
        $list = explode(',', $row['tx_newsfeuser_user']);
        $sortedItems = [];
        foreach ($list as $id) {
            foreach ($this->arguments['user'] as $user) {
                if ((int)$user->getUid() === (int)$id) {
                    $sortedItems[] = $user;
                }
            }
        }

        $this->templateVariableContainer->add($this->arguments['as'], $sortedItems);
        $output = $this->renderChildren();
        $this->templateVariableContainer->remove($this->arguments['as']);
        return $output;
    }


}