<?php
namespace Trung\ManageTab\Controller\Adminhtml\Tab;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Trung\ManageTab\Model\TabFactory;

class Delete extends Action
{
    protected $tabFactory;

    public function __construct(
        Context $context,
        TabFactory $tabFactory
    ) {
        parent::__construct($context);
        $this->tabFactory = $tabFactory;
    }

    public function execute()
    {
        $tabId = $this->getRequest()->getParam('tab_id');
        if ($tabId) {
            try {
                $tab = $this->tabFactory->create();
                $tab->load($tabId);
                $tab->delete();
                $this->messageManager->addSuccessMessage(__('The tab has been deleted.'));
                $this->_redirect('*/*/');
                return;
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('An error occurred while deleting the tab.'));
            }
        }
        $this->_redirect('*/*/');
    }
}
