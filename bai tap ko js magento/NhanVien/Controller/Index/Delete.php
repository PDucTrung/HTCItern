<?php
namespace Trung\NhanVien\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Trung\NhanVien\Model\NhanVienFactory;

class Delete extends Action
{
    private $jsonFactory;
    private $nhanVienFactory;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        NhanVienFactory $nhanVienFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->nhanVienFactory = $nhanVienFactory;
    }

    public function execute()
    {
        $result = $this->jsonFactory->create();

        $id = $this->getRequest()->getParam('id');

        $nhanVien = $this->nhanVienFactory->create()->load($id);
        $nhanVien->delete();

        return $result->setData(['success' => true]);
    }
}
