<?php

namespace Trung\BaiTapLayout\Block;

class Display extends \Magento\Framework\View\Element\Template
{
    public function getText($text)
    {
        return "$text";
    }

    // method title
    public function getCustomTitle()
    {
        return $this->_scopeConfig->getValue('mycustomsection/mycustomtitlegroup/mycustomtitle');
    }

    public function getEnableTitle()
    {
        return $this->_scopeConfig->getValue('mycustomsection/mycustomtitlegroup/mycustomtitleenable');
    }

    // method quanity
    public function getCustomQuantity()
    {
        return $this->_scopeConfig->getValue('mycustomsection/mycustomquantitygroup/mycustomquantitynumber');
    }
}
