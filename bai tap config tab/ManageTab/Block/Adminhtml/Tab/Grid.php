<?php
namespace Trung\ManageTab\Block\Adminhtml\Tab;

use Magento\Backend\Block\Template;
use Trung\ManageTab\Model\TabFactory;

class Grid extends Template
{
    protected $tabFactory;

    public function __construct(
        Template\Context $context,
        TabFactory $tabFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->tabFactory = $tabFactory;
    }

    public function getTabs()
    {
        $tabCollection = $this->tabFactory->create()->getCollection();
        return $tabCollection;
    }
}
