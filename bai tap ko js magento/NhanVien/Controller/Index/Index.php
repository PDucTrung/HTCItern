<?php

namespace Trung\NhanVien\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Trung\NhanVien\Model\NhanVienFactory;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    private $jsonFactory;
    private $nhanVienFactory;
    private $pageFactory;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        NhanVienFactory $nhanVienFactory,
        PageFactory $pageFactory,
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->nhanVienFactory = $nhanVienFactory;
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        // $result = $this->jsonFactory->create();
        // $nhanVienCollection = $this->nhanVienFactory->create()->getCollection();

        // $data = [];
        // foreach ($nhanVienCollection as $nhanVien) {
        //     $data[] = [
        //         'entity_id' => $nhanVien->getEntityId(),
        //         'name' => $nhanVien->getName(),
        //         'age' => $nhanVien->getAge(),
        //         'job' => $nhanVien->getJob()
        //     ];
        // }

        // return $result->setData($data);

        return $this->pageFactory->create();
    }

}
