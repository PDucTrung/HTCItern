<?php
namespace Trung\ManageTab\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Tab extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('trung_managetab_tab', 'tab_id');
    }
}
