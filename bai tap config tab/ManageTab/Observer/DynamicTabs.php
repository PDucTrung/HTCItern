<?php

namespace Trung\ManageTab\Observer;

use Trung\ManageTab\Model\TabConfig;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class DynamicTabs implements ObserverInterface
{
    const PARENT_BlOCK_NAME = 'product.info.details';
    const RENDERING_TEMPLATE = 'Trung_ManageTab::dynamic_tabs.phtml';

    private $tabs;

    public function __construct(TabConfig $tabs)
    {
        $this->tabs = $tabs;
    }

    public function execute(Observer $observer)
    {
        $layout = $observer->getLayout();
        $blocks = $layout->getAllBlocks();
        foreach ($blocks as $key => $block) {
            if ($block->getNameInLayout() == self::PARENT_BlOCK_NAME) {
                foreach ($this->tabs->getTabs() as $key => $tab) {
                    $block->addChild(
                        $key,
                        \Magento\Catalog\Block\Product\View::class,
                        [
                            'template' => self::RENDERING_TEMPLATE,
                            'title'     =>  $tab['title'],
                            'jsLayout'      =>  [
                                $tab
                            ]
                        ]
                    );
                }
            }
        }
    }
}