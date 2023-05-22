<?php

namespace Trung\BaiTapLayout\Controller\Get;

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Trung\BaiTapLayout\Model\TrungFactory;

class Data extends Action
{
    protected $PageFactory;
    protected $TrungFactory;

    public function __construct(Context $context, PageFactory $pageFactory, TrungFactory $trungFactory)
    {
        parent::__construct($context);
        $this->PageFactory = $pageFactory;
        $this->TrungFactory = $trungFactory;
    }

    public function execute()
    {
        $post = $this->TrungFactory->create();
        $collection = $post->getCollection();
        foreach ($collection as $item) {
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        exit();
        return $this->TrungFactory->create();
    }
}
