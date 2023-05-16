<?php

namespace Trung\HelloWorld\Block;

class Display extends \Magento\Framework\View\Element\Template
{
    public function __construct(\Magento\Framework\View\Element\Template\Context $context)
    {
        parent::__construct($context);
    }

    public function sayHello()
    {
        $hello = "Hello World";
        return __($hello);
    }

    public function sayGoodBye()
    {
        return __('Good Bye!');
    }
}
