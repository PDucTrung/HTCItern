<?php

namespace Trung\BaiTapLayout\Block;

use Trung\BaiTapLayout\Model\TrungFactory;

class Display extends \Magento\Framework\View\Element\Template
{
    protected $TrungFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        TrungFactory $trungFactory
    ) {
        $this->TrungFactory = $trungFactory;
        parent::__construct($context);
    }

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
