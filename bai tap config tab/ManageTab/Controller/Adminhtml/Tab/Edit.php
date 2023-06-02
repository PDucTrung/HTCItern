<?php

namespace Trung\ManageTab\Controller\Adminhtml\Tab;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Trung\ManageTab\Model\TabFactory;

class Edit extends Action
{
    protected $coreRegistry;
    protected $resultPageFactory;
    protected $tabFactory;

    public function __construct(
        Action\Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        TabFactory $tabFactory
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->resultPageFactory = $resultPageFactory;
        $this->tabFactory = $tabFactory;
    }

    public function execute()
    {
        $tabId = $this->getRequest()->getParam('tab_id');
        $tab = $this->tabFactory->create();

        if ($tabId) {
            $tab->load($tabId);
            if (!$tab->getId()) {
                $this->messageManager->addErrorMessage(__('This tab no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        $this->coreRegistry->register('current_tab', $tab);

        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('Edit Tab'));

        return $resultPage;
    }
}
