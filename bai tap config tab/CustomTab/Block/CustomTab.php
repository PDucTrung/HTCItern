<?php

namespace Trung\CustomTab\Block;

use Magento\Framework\View\Element\Template;
use stdClass;

class CustomTab extends Template
{
    public function getTabData()
    {
        // Lấy thông tin các tab từ phần quản trị
        $customTabName = $this->_scopeConfig->getValue('trung_custom_tab_section/general/name', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $customTabContent = $this->_scopeConfig->getValue('trung_custom_tab_section/general/content', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $customTabStatus = $this->_scopeConfig->getValue('trung_custom_tab_section/general/status', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        // Thêm tab tùy chỉnh vào danh sách các tab
        $tabs = new stdClass;
        $tabs->title = $customTabName;
        $tabs->content = $customTabContent;
        $tabs->status = $customTabStatus;


        return $tabs;
    }
}
