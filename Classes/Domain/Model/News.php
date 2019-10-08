<?php

namespace GeorgRinger\NewsFeuser\Domain\Model;

class News extends \GeorgRinger\News\Domain\Model\News {

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FrontendUser>
     * @Extbase\ORM\Lazy
     */
    protected $txNewsfeuserUser;

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getNewsFeUser()
    {
        return $this->txNewsfeuserUser;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $txNewsfeuserUser
     */
    public function setTxNewsfeuserUser($txNewsfeuserUser)
    {
        $this->txNewsfeuserUser = $txNewsfeuserUser;
    }
}
