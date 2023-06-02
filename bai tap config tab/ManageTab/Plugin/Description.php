<?php

namespace Trung\ManageTab\Plugin;

use Trung\ManageTab\Model\TabConfig;

class Description
{
    private $tabs;


    public function __construct(
        TabConfig $tabs
    ) {
        $this->tabs = $tabs;
    }

    public function afterGetGroupSortedChildNames(
        \Magento\Catalog\Block\Product\View\Details $subject,
        $result
    ) {
        if (!empty($this->tabs->getTabs())) {
            foreach ($this->tabs->getTabs() as $key => $tab) {
                $sortOrder = isset($tab['sortOrder']) ? $tab['sortOrder'] : 45;
                $result = array_merge($result, [ $sortOrder => 'product.info.details.' . $key]);
            }
        }
        return $result;
    }
}