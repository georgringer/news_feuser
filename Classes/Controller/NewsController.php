<?php

namespace GeorgRinger\NewsFeuser\Controller;

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
 * Class GeorgRinger\Eventnews\Controller\NewsController
 */
class NewsController extends \GeorgRinger\News\Controller\NewsController {

    /**
     * User view
     *
     * @param array $overwriteDemand
     */
    public function perUserAction(
        array $overwriteDemand = null
    ) {
        $demand = $this->createDemandObjectFromSettings($this->settings);
        $demand->setActionAndClass(__METHOD__, __CLASS__);

        $assignedValues = array(
            'news' => $this->newsRepository->findDemanded($demand),
            'overwriteDemand' => $overwriteDemand,
            'demand' => $demand,
        );

        $this->view->assignMultiple($assignedValues);
    }
}