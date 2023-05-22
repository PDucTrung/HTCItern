<?php

namespace Trung\BaiTapLayout\Controller\Index;

use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\App\RequestInterface;
use Trung\BaiTapLayout\Model\TrungFactory;

class Action extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $redirectFactory;
    protected $request;
    protected $trungFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        RedirectFactory $redirectFactory,
        RequestInterface $request,
        TrungFactory $trungFactory
    ) {
        $this->_pageFactory = $pageFactory;
        $this->trungFactory = $trungFactory;
        $this->redirectFactory = $redirectFactory;
        $this->request = $request;
        return parent::__construct($context);
    }

    public function execute()
    {
        $act = isset($_GET["act"]) ? $_GET["act"] : "";

        // model
        $myModel = $this->trungFactory->create();

        // redirect
        $resultRedirect = $this->redirectFactory->create();

        // action
        switch ($act) {
            case "add": {
                    $myModel->setData('field1', $this->getRequest()->getParam('field1'));
                    $myModel->setData('field2', $this->getRequest()->getParam('field2'));

                    $myModel->save();

                    // quay ve trang chính 
                    $resultRedirect->setPath('http://trung.magento2.com/baitaplayout/index/table');
                    return $resultRedirect;
                }
            case "edit": {
                    $id = isset($_GET["id"]) ? $_GET["id"] : "";

                    // quay ve trang chính 
                    $resultRedirect->setPath("http://trung.magento2.com/baitaplayout/index/formedit?id=$id");

                    return $resultRedirect;
                }

            case "do_edit": {
                    // method update
                    $id = $this->getRequest()->getParam('idedit');

                    $myModel->load("$id");

                    $myModel->setData('field1', $this->getRequest()->getParam('field1'));
                    $myModel->setData('field2', $this->getRequest()->getParam('field2'));

                    $myModel->save();

                    // quay ve trang chính 
                    $resultRedirect->setPath('http://trung.magento2.com/baitaplayout/index/table');

                    return $resultRedirect;
                }
            case "delete": {
                    $id = isset($_GET["id"]) ? $_GET["id"] : "";

                    // method delete
                    $myModel->load("$id");
                    $myModel->delete();

                    // quay ve trang chính 
                    $resultRedirect->setPath('http://trung.magento2.com/baitaplayout/index/table');

                    return $resultRedirect;
                }
        }
    }
}
