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

use GeorgRinger\Eventnews\Domain\Model\Dto\Demand;
use GeorgRinger\News\Domain\Model\Dto\NewsDemand;
use GeorgRinger\NewsFeuser\Domain\Model\Dto\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

class AbstractDemandedRepository
{
    /** @var  ExtensionConfiguration */
    protected $extensionConfiguration;

    public function __construct()
    {
        $this->extensionConfiguration = GeneralUtility::makeInstance(ExtensionConfiguration::class);
    }

    /**
     * Modify the constraints used in the query
     *
     * @param array $params
     * @return void
     */
    public function modify(array $params)
    {
        /** @var NewsDemand $demand */
        $demand = $params['demand'];
        if ($demand->getAction() !== 'GeorgRinger\News\Controller\NewsController::perUserAction') {
            return;
        }
        $this->updateEventConstraints($params['demand'], $params['respectEnableFields'], $params['query'],
            $params['constraints']);
    }

    /**
     * Update the constraints
     *
     * @param NewsDemand $demand
     * @param bool $respectEnableFields
     * @param \TYPO3\CMS\Extbase\Persistence\QueryInterface $query
     * @param array $constraints
     * @return void
     */
    protected function updateEventConstraints(
        NewsDemand $demand,
        $respectEnableFields,
        \TYPO3\CMS\Extbase\Persistence\QueryInterface $query,
        array &$constraints
    )
    {
        $configuration = $this->extensionConfiguration->getVariable();
        if (!empty($configuration)) {
            $getValue = (int)$this->getGlobal($configuration, GeneralUtility::_GET());
            if ($getValue === 0) {
                $constraints[] = $query->equals('deleted', '1');
            } else {
                $constraints[] = $query->contains('txNewsfeuserUser', $getValue);
            }
        }
    }

    protected function getGlobal($keyString, $source = null)
    {
        $keys = explode('|', $keyString);
        $numberOfLevels = count($keys);
        $rootKey = trim($keys[0]);
        $value = isset($source) ? $source[$rootKey] : $GLOBALS[$rootKey];
        for ($i = 1; $i < $numberOfLevels && isset($value); $i++) {
            $currentKey = trim($keys[$i]);
            if (is_object($value)) {
                $value = $value->{$currentKey};
            } elseif (is_array($value)) {
                $value = $value[$currentKey];
            } else {
                $value = '';
                break;
            }
        }
        if (!is_scalar($value)) {
            $value = '';
        }
        return $value;
    }
}
