<?php

namespace Trung\HelloWorld\Model;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'trung_helloworld_post';

    protected $_cacheTag = 'trung_helloworld_post';

    protected $_eventPrefix = 'trung_helloworld_post';

    protected function _construct()
    {
        $this->_init('Trung\HelloWorld\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
