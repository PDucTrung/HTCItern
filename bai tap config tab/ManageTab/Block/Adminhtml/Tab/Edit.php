<?php

namespace Trung\ManageTab\Block\Adminhtml\Tab;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Trung\ManageTab\Model\TabFactory;

class Edit extends Template
{
    protected $coreRegistry;
    protected $tabFactory;

    public function __construct(
        Context $context,
        Registry $coreRegistry,
        TabFactory $tabFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->coreRegistry = $coreRegistry;
        $this->tabFactory = $tabFactory;
    }

    public function getTabId()
    {
        $tab = $this->getTab();
        return $tab ? $tab->getId() : null;
    }

    public function getTabName()
    {
        $tab = $this->getTab();
        return $tab ? $tab->getName() : '';
    }

    public function getTabContent()
    {
        $tab = $this->getTab();
        return $tab ? $tab->getContent() : '';
    }

    public function getTabStatus()
    {
        $tab = $this->getTab();
        return $tab ? $tab->getStatus() : null;
    }

    public function getTab()
    {
        return $this->coreRegistry->registry('current_tab');
    }
}
