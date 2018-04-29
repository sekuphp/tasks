<?php

namespace Seku\Tasks\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Seku\Tasks\Model\TaskFactory;
use Magento\Framework\Registry;
use Magento\Backend\App\Action\Context;

abstract class Task extends Action
{
    protected $taskFactory;
    protected $task;
    protected $context;
    protected $registry;

    public function __construct(
        TaskFactory $taskFactory,
        \Seku\Tasks\Model\ResourceModel\Task $task,
        Registry $registry,
        Context $context
    ) {
        $this->taskFactory  = $taskFactory;
        $this->task  = $task;
        $this->registry     = $registry;
        $this->context      = $context;

        $this->resultFactory = $context->getResultFactory();

        parent::__construct($context);
    }

    public function initModel()
    {
        $model = $this->taskFactory->create();
        $id = $this->getRequest()->getParam('id');
        
        if ($id && !is_array($id)) {
            $this->task->load($model, $id,'id');
        }

        $this->registry->register('current_model', $model);

        return $model;
    }
}
