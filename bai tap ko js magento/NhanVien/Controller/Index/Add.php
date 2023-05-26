<?php
namespace Trung\NhanVien\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Trung\NhanVien\Model\NhanVienFactory;

class Add extends Action
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

        $name = $this->getRequest()->getParam('name');
        $age = $this->getRequest()->getParam('age');
        $job = $this->getRequest()->getParam('job');

        $nhanVien = $this->nhanVienFactory->create();
        $nhanVien->setName($name);
        $nhanVien->setAge($age);
        $nhanVien->setJob($job);
        $nhanVien->save();

        return $result->setData([
            'entity_id' => $nhanVien->getEntityId(),
            'name' => $nhanVien->getName(),
            'age' => $nhanVien->getAge(),
            'job' => $nhanVien->getJob()
        ]);
    }
}
