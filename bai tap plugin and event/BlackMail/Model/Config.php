<?php
namespace Trung\BlackMail\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    const XML_PATH_BLACKLIST_EMAILS = 'blackmail/general/blacklist_emails';

    protected $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    // method get value list black mail
    public function getBlacklistEmailsConfig()
    {
        return $this->scopeConfig->getValue(self::XML_PATH_BLACKLIST_EMAILS, ScopeInterface::SCOPE_STORE);
    }
}
