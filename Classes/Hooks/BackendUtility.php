<?php

namespace GeorgRinger\NewsFeuser\Hooks;

class BackendUtility extends \GeorgRinger\News\Hooks\BackendUtility
{

    /**
     * @param array|string $params
     * @param array $reference
     */
    public function update(&$params, &$reference)
    {
        if ($params['selectedView'] === 'News->perUser') {
            $removedFields = $this->removedFieldsInListView;

            $this->deleteFromStructure($params['dataStructure'], $removedFields);
        }
    }
}
