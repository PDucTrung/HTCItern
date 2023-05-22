<?php

namespace Trung\BaiTapLayout\Model;

use Magento\Framework\Model\AbstractModel;

class Trung extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Trung\BaiTapLayout\Model\ResourceModel\Trung');
    }
}
