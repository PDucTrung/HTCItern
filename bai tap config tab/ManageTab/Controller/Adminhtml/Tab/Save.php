<?php

namespace Trung\ManageTab\Controller\Adminhtml\Tab;

use Magento\Backend\App\Action;
use Trung\ManageTab\Model\TabFactory;

class Save extends Action
{
    protected $tabFactory;

    public function __construct(
        Action\Context $context,
        TabFactory $tabFactory
    ) {
        parent::__construct($context);
        $this->tabFactory = $tabFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        if (!$data) {
            $this->_redirect('*/*/add');
            return;
        }

        try {
            $tab = $this->tabFactory->create();
            if (isset($data['tab_id'])) {
                $tab->load($data['tab_id']);
            }

            $tab->setName($data['name']);
            $tab->setContent($data['content']);
            $tab->setStatus($data['status']);
            $tab->save();

            $this->messageManager->addSuccessMessage(__('Tab has been saved.'));
            $this->_redirect('*/*/');

        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->_redirect('*/*/add');
        }
    }
}
