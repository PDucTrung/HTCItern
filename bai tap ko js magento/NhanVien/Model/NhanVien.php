<?php

namespace Trung\NhanVien\Model;

use Magento\Framework\Model\AbstractModel;

class NhanVien extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel\NhanVien::class);
    }
}
