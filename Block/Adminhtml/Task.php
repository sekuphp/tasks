<?php
namespace Seku\Tasks\Block\Adminhtml;

use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\Element\Template;
use Magento\Framework\Data\Form\FormKey;
use Magento\Framework\Registry;

class Task extends Template
{
    protected $formKey;
    protected $registry;


    public function __construct(
        FormKey $formKey,
        Registry $registry,
        Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);

        $this->formKey = $formKey;
        $this->registry = $registry;
    }

    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }

    public function getLink($type, $id = null)
    {
        switch ($type) {
            case 'add':
                $route = '*/*/add';
            break;
            case 'edit':
                $route = '*/*/edit';
            break;
            case 'delete':
                $route = '*/*/del';
            break;
            case 'tasks': default:
                $route = '*/*/';
        }
        return $this->getUrl($route, ['id' => $id]);
    }


}