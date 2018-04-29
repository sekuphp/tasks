<?php

namespace Seku\Tasks\Controller\Adminhtml\Task;

use Seku\Tasks\Controller\Adminhtml\Task;

class Add extends Task
{

    public function execute()
    { 
        $resultRedirect = $this->resultRedirectFactory->create();

        $data = $this->getRequest()->getParams();
        $data = $this->filterPostData($data);

        if ($data) {
            $model = $this->initModel();

            $model->setData($data);

            try {

                $this->task->save($model);

                $this->messageManager->addSuccessMessage(__('Задача была добавлена!'));

                return $this->context->getResultRedirectFactory()->create()->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());

                return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
            }
        } else {
            $resultRedirect->setPath('*/*/');
            $this->messageManager->addErrorMessage('Недостаточно данных для добавления.');

            return $resultRedirect;
        }
    }

    protected function filterPostData($data)
    {
        $result = $data;

        foreach ($result as $key => $value) {
            if (!$value || $key == 'form_key' || $key == 'key')
                unset($result[$key]);
        }

        return $result;
    }
}
