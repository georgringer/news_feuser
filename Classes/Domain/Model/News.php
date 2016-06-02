<?php

namespace GeorgRinger\NewsFeuser\Domain\Model;

class News extends \GeorgRinger\News\Domain\Model\News {

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     */
    protected $txNewsfeuserUser;

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     */
    public function getNewsFeUser()
    {
        return $this->txNewsfeuserUser;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $txNewsfeuserUser
     */
    public function setTxNewsfeuserUser($txNewsfeuserUser)
    {
        $this->txNewsfeuserUser = $txNewsfeuserUser;
    }
}