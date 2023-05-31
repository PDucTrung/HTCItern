<?php
namespace Trung\BlackMail\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class BlacklistEmails extends Field
{
    protected $config;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Trung\BlackMail\Model\Config $config,
        array $data = []
    ) {
        $this->config = $config;
        parent::__construct($context, $data);
    }

    protected function _getElementHtml(AbstractElement $element)
    {
        $this->setElement($element);
        $html = $this->toHtml();
        return $html;
    }

    public function render(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        $element->setScopeLabel('');
        return $this->_getElementHtml($element);
    }

    public function getBlacklistEmails()
    {
        return $this->config->getBlacklistEmailsConfig();
    }
}
