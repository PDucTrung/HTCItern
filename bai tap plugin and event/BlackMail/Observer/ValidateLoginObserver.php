<?php

namespace Trung\BlackMail\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Trung\BlackMail\Model\Config;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ActionFlag;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\Message\ManagerInterface;

class ValidateLoginObserver implements ObserverInterface
{
    protected $config;
    protected $actionFlag;
    protected $redirect;
    protected $messageManager;

    public function __construct(
        Config $config,
        ActionFlag $actionFlag,
        RedirectInterface $redirect,
        ManagerInterface $messageManager,
    ) {
        $this->config = $config;
        $this->actionFlag = $actionFlag;
        $this->redirect = $redirect;
        $this->messageManager = $messageManager;
    }

    public function execute(Observer $observer)
    {
        $emails = $this->getEmailsFromBlackListConfig();

        // check
        $controller = $observer->getControllerAction();
        $email = $controller->getRequest()->getParam('login')['username'];
        if (in_array($email, $emails)) {
            // msg 
            $this->messageManager->addErrorMessage(__('Your email is blacklisted.'));

            // chặn việc gửi response và chuyển hướng đến trang khác
            $this->actionFlag->set('', Action::FLAG_NO_DISPATCH, true);

            // chuyển hướng người dùng đến trang customer/account/login
            $this->redirect->redirect($controller->getResponse(), 'customer/account/login');
        }
    }

    // Lấy Email từ config admin
    protected function getEmailsFromBlackListConfig()
    {
        $emailsString = trim($this->config->getBlacklistEmailsConfig());

        // convert string to arr
        $emails = explode(',', $emailsString);

        // loại bỏ khoảng trắng đầu cuối
        $emails = array_map('trim', $emails);
        return $emails;
    }
}
