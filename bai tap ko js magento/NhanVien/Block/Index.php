<?php

namespace Trung\NhanVien\Block;

use Trung\NhanVien\Model\NhanVien;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_template = 'Trung_NhanVien::index.phtml';
    protected $nhanVienModel;

    public function __construct(\Magento\Framework\View\Element\Template\Context $context, NhanVien $nhanVienModel, array $data = [])
    {
        $this->nhanVienModel = $nhanVienModel;
        parent::__construct($context, $data);
    }

    public function getEmployees()
    {
        return $this->nhanVienModel->getCollection();
    }

    public function getEmployeesJson()
    {
        $employees = $this->getEmployees();
        $employeesData = [];

        foreach ($employees as $nhanVien) {
            $employeesData[] = [
                'entity_id' => $nhanVien->getEntityId(),
                'name' => $nhanVien->getName(),
                'age' => $nhanVien->getAge(),
                'job' => $nhanVien->getJob()
            ];
        }

        return json_encode($employeesData);
    }
}
