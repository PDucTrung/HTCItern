<?php

namespace Trung\BaiTapLayout\Controller\Index;

use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\App\RequestInterface;

class Action extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $resourceConnection;
    protected $redirectFactory;
    protected $request;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        ResourceConnection $resourceConnection,
        RedirectFactory $redirectFactory,
        RequestInterface $request
    ) {
        $this->_pageFactory = $pageFactory;
        $this->resourceConnection = $resourceConnection;
        $this->redirectFactory = $redirectFactory;
        $this->request = $request;
        return parent::__construct($context);
    }

    public function execute()
    {
        $act = isset($_GET["act"]) ? $_GET["act"] : "";
        $id = isset($_GET["id"]) ? $_GET["id"] : "";

        // table
        $connection = $this->resourceConnection->getConnection();
        $tableName = $connection->getTableName('my_module_my_table');

        // redirect
        $resultRedirect = $this->redirectFactory->create();

        // action
        switch ($act) {
            case "add": {
                    $data = [
                        'field1' => $this->request->getParam('field1'),
                        'field2' => $this->request->getParam('field2')
                    ];

                    // method insert
                    $connection->insert($tableName, $data);

                    // quay ve trang chính 
                    $resultRedirect->setPath('http://trung.magento2.com/baitaplayout/index/table');
                    return $resultRedirect;
                }
            case "edit": {
                    // quay ve trang chính 
                    $resultRedirect->setPath("http://trung.magento2.com/baitaplayout/index/formedit?id=$id");

                    return $resultRedirect;
                }

            case "do_edit": {
                    $data = [
                        'field1' => $this->request->getParam('field1'),
                        'field2' => $this->request->getParam('field2')
                    ];

                    $id_post = $this->request->getParam('id');

                    // method update
                    $connection->update($tableName, $data, ['id = ?' => $id_post]);

                    // quay ve trang chính 
                    $resultRedirect->setPath('http://trung.magento2.com/baitaplayout/index/table');

                    return $resultRedirect;
                }
            case "delete": {
                    // method delete
                    $connection->delete($tableName, ['id = ?' => $id]);

                    // quay ve trang chính 
                    $resultRedirect->setPath('http://trung.magento2.com/baitaplayout/index/table');

                    return $resultRedirect;
                }
        }
    }
}
