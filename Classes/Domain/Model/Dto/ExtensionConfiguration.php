<?php

namespace GeorgRinger\NewsFeuser\Domain\Model\Dto;

class ExtensionConfiguration
{

    /** @var string */
    protected $variable;

    public function __construct()
    {
        $settings = (array)unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['news_feuser']);
        foreach ($settings as $key => $value) {
            if (property_exists(__CLASS__, $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @return string
     */
    public function getVariable()
    {
        return $this->variable;
    }

}
