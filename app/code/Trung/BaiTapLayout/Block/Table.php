<?php

namespace Trung\BaiTapLayout\Block;

use Trung\BaiTapLayout\Model\TrungFactory;

class Table extends \Magento\Framework\View\Element\Template
{
    protected $TrungFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        TrungFactory $trungFactory
    ) {
        $this->TrungFactory = $trungFactory;
        parent::__construct($context);
    }

    public function getTrungCollection()
    {
        $data = $this->TrungFactory->create();
        return $data->getCollection();
    }

    public function getCollectionById($id)
    {
        $data = $this->TrungFactory->create();
        $collection = $data->getCollection();
        $collection->addFieldToFilter('id', $id);
        return $collection->getItems();
    }
}
