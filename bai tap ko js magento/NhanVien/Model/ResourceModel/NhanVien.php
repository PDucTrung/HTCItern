<?php
namespace Trung\NhanVien\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class NhanVien extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('nhan_vien', 'entity_id');
    }
}
