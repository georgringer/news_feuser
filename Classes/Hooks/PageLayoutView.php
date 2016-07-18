<?php

namespace GeorgRinger\NewsFeuser\Hooks;

    /*
     * This file is part of the TYPO3 CMS project.
     *
     * It is free software; you can redistribute it and/or modify it under
     * the terms of the GNU General Public License, either version 2
     * of the License, or any later version.
     *
     * For the full copyright and license information, please read the
     * LICENSE.txt file that was distributed with this source code.
     *
     * The TYPO3 project - inspiring people to share!
     */

/**
 * Class PageLayoutView
 *
 * @package GeorgRinger\Eventnews\Hooks
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