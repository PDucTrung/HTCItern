<?php

namespace Trung\ManageTab\Block\Adminhtml\Tab;

use Magento\Backend\Block\Template;

class Add extends Template
{
    public function getHeaderText()
    {
        return __('Add New Tab');
    }
}
