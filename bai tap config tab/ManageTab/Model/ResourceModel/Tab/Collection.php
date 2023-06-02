<?php
namespace Trung\ManageTab\Model\ResourceModel\Tab;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Trung\ManageTab\Model\Tab::class,
            \Trung\ManageTab\Model\ResourceModel\Tab::class
        );
    }
}
