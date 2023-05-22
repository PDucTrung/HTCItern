<?php

namespace Trung\BaiTapLayout\Model\ResourceModel\Trung;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Trung\BaiTapLayout\Model\Trung',
            'Trung\BaiTapLayout\Model\ResourceModel\Trung'
        );
    }
}
