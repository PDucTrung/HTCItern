<?php
namespace Trung\BlackMail\Plugin\Customer\Account;

use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\App\Response\RedirectInterface;
use Trung\BlackMail\Model\Config;

class CreatePostPlugin
{
    protected $messageManager;
    protected $redirectFactory;
    protected $redirect;
    protected $config;

    public function __construct(
        ManagerInterface $messageManager,
        RedirectFactory $redirectFactory,
        RedirectInterface $redirect,
        Config $config
    ) {
        $this->messageManager = $messageManager;
        $this->redirectFactory = $redirectFactory;
        $this->redirect = $redirect;
        $this->config = $config;
    }

    public function aroundExecute(
        \Magento\Customer\Controller\Account\CreatePost $subject,
        callable $proceed
    ) {
        $emails = $this->getEmailsFromBlackListConfig();

        // check
        $email = $subject->getRequest()->getParam('email');
        if (in_array($email, $emails)) {
            $this->messageManager->addErrorMessage(__('Your email is blacklisted.'));
            $resultRedirect = $this->redirectFactory->create();
            $resultRedirect->setPath('customer/account/create');
            return $resultRedirect;
        }

        return $proceed();
    }

    // Lấy Email từ config admin
    protected function getEmailsFromBlackListConfig()
    {
        $emailsString = trim($this->config->getBlacklistEmailsConfig());
        $emails = explode(',', $emailsString);
        $emails = array_map('trim', $emails);
        return $emails;
    }
}
