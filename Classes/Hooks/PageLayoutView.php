<?php

namespace GeorgRinger\NewsFeuser\Hooks;

/**
 * Class PageLayoutView
 */
class PageLayoutView
{

    /**
     * Provide an extension summary for the month selection
     *
     * @param array $params
     * @param \GeorgRinger\News\Hooks\PageLayoutView $pageLayout
     * @return void
     */
    public function extensionSummary(array $params, \GeorgRinger\News\Hooks\PageLayoutView $pageLayout)
    {
        if (strtolower($params['action']) === 'news_peruser') {
            $pageLayout->getStartingPoint();
            $pageLayout->getTimeRestrictionSetting();
            $pageLayout->getTopNewsRestrictionSetting();
            $pageLayout->getOrderSettings();
            $pageLayout->getCategorySettings();
            $pageLayout->getArchiveSettings();
            $pageLayout->getOffsetLimitSettings();
            $pageLayout->getDetailPidSetting();
            $pageLayout->getListPidSetting();
            $pageLayout->getTagRestrictionSetting();
        }
    }
}
