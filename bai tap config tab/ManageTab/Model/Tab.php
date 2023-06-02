<?php
namespace Trung\ManageTab\Model;

use Magento\Framework\Model\AbstractModel;

class Tab extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Trung\ManageTab\Model\ResourceModel\Tab::class);
    }
}
