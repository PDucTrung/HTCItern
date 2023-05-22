<?php

namespace Trung\BaiTapLayout\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Trung extends AbstractDb
{
    protected function _construct()
    {
        // my_module_my_table là tên bảng , id là khóa chính primary của bảng
        $this->_init('my_module_my_table', 'id');
    }
}
