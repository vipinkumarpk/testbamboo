<?php

namespace Application\Controller;

use Application\Controller\EntityUsingController;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;

use Application\Form\PositionForm;
use Application\Entity\Position;

use Zend\View\Model\JsonModel;
// Pagination
 use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
 use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
 use Zend\Paginator\Paginator;
 use Zend\View\Model\ViewModel;

class PositionController extends EntityUsingController
{
    /**
    * Index action
    */
    public function indexAction()
    {
        $entityManager = $this->getEntityManager();
        $repository = $entityManager->getRepository('Application\Entity\Position');
        $adapter = new DoctrineAdapter(new ORMPaginator($repository->createQueryBuilder('q')));
        //$adapter->add('where', 'firstnaem = "Finbarr"');
        $paginator = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage(2);

        $page = 1;
        if ($this->params()->fromRoute('page')) $page = $this->params()->fromRoute('page');

        if($page) $paginator->setCurrentPageNumber($page);
     

        return new ViewModel(array('paginator' => $paginator,));
    }


    public function editAction()
    {
        $position = new Position;

        if ($this->params('id') > 0) {
            $position = $this->getEntityManager()->getRepository('Application\Entity\Position')->find($this->params('id'));
        }

        $form = new PositionForm($this->getEntityManager());
        $form->setHydrator(new DoctrineEntity($this->getEntityManager(),'Application\Entity\Position'));
        $form->bind($position);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($position->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $em = $this->getEntityManager();
                $em->persist($position);
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Position Saved');

                return $this->redirect()->toRoute('application/default', array('controller' => 'position','action' =>  'index'));
            }
        }

        return new ViewModel(array(
            'position' => $position,
            'form' => $form
        ));
    }



    /**
    * Add action
    */
    public function addAction()
    {
        return $this->editAction();
    }

    public function viewAction()
    {
        if ($this->params('id') > 0) {
            $position = $this->getEntityManager()->getRepository('Application\Entity\Position')->find($this->params('id'));
        }


        $viewModel = new ViewModel(array(
            'position' => $position,
        ));

        return $viewModel;
    }


    /**
    * Delete action
    */
    public function deleteAction()
    {
        $position = $this->getEntityManager()->getRepository('Application\Entity\Position')->find($this->params('id'));

        if ($position) {
            $em = $this->getEntityManager();
            $em->remove($position);
            $em->flush();

            $this->flashMessenger()->addSuccessMessage('Position Deleted');
        }

        return $this->redirect()->toRoute('application/default', array('controller' => 'position','action' =>  'index'));
    }
}
