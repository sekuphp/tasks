<?php

namespace Seku\Tasks\Controller\Adminhtml\Task;

use Seku\Tasks\Controller\Adminhtml\Task;

class Del extends Task
{

    public function execute()
    {
        $model = $this->initModel();

        $resultRedirect = $this->resultRedirectFactory->create();

        if ($model->getId()) {
            try {
                $this->task->delete($model);

                $this->messageManager->addSuccessMessage(__('Задача была удалена!'));

                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId()]);
            }
        } else {
            $this->messageManager->addErrorMessage(__('Задача не найдена!'));

            return $resultRedirect->setPath('*/*/');
        }
    }
}