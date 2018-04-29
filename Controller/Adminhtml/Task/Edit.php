<?php
    namespace Seku\Tasks\Controller\Adminhtml\Task;

    use Seku\Tasks\Controller\Adminhtml\Task;

    class Edit extends Task
    {

        public function execute()
        {
            $id = $this->getRequest()->getParam('id');
            $model = $this->initModel();

            if ($id && !is_array($id) && !$model->getId()) {
                $this->messageManager->addErrorMessage(__('Задача не найдена!'));
                return $this->resultRedirectFactory->create()->setPath('*/*/');
            }

            $this->_view->loadLayout();
            $this->_view->renderLayout();
        }

    }
?>