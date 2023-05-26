<?php

namespace Trung\NhanVien\Model\ResourceModel\NhanVien;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'trung_nhanvien_collection';
    protected $_eventObject = 'nhanvien_collection';


    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Trung\NhanVien\Model\NhanVien', 'Trung\NhanVien\Model\ResourceModel\NhanVien');
    }
}