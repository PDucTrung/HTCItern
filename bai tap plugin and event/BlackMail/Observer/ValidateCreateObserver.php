<?php
namespace Trung\BlackMail\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Trung\BlackMail\Model\Config;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ActionFlag;
use Magento\Framework\App\Response\RedirectInterface;

class ValidateCreateObserver implements ObserverInterface
{
    protected $config;
    protected $actionFlag;
    protected $redirect;

    public function __construct(
        Config $config,
        ActionFlag $actionFlag,
        RedirectInterface $redirect
    ) {
        $this->config = $config;
        $this->actionFlag = $actionFlag;
        $this->redirect = $redirect;
    }

    public function execute(Observer $observer)
    {
        $emails = $this->getEmailsFromBlackListConfig();

        // check
        $controller = $observer->getControllerAction();
        $email = $controller->getRequest()->getParam('email');
        if (in_array($email, $emails)) {
            $this->addErrorMessage(__('Your email is blacklisted.'));
            $this->actionFlag->set('', Action::FLAG_NO_DISPATCH, true);
            $this->redirect->redirect($controller->getResponse(), 'customer/account/create');
        }
    }

    // Lấy Email từ config admin
    protected function getEmailsFromBlackListConfig()
    {
        $emailsString = trim($this->config->getBlacklistEmailsConfig());
        $emails = explode(',', $emailsString);
        $emails = array_map('trim', $emails);
        return $emails;
    }

    protected function addErrorMessage($message)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $messageManager = $objectManager->get(\Magento\Framework\Message\ManagerInterface::class);
        $messageManager->addErrorMessage($message);
    }
}
