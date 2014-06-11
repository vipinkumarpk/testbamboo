<?php

namespace Application\Controller;

use Application\Controller\EntityUsingController;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;

use Application\Form\ProfileForm;
use Application\Entity\Profile;

use Zend\View\Model\JsonModel;
// Pagination
 use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
 use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
 use Zend\Paginator\Paginator;
 use Zend\View\Model\ViewModel;

class ProfileController extends EntityUsingController
{
    /**
    * Index action
    */
    public function indexAction()
    {
        //CHECKING IF USER IS AUTHENTICATED
        $auth = $this->getServiceLocator()->get('zfcuser_auth_service');

        if( $auth->hasIdentity() ){
            $user   = $auth->getIdentity();            
            $userId = $user->getId();
           
            $roles  = $user->getRoles();
            foreach ($roles as $role) {
                if($role->getRoleId() == "candidate"){
                    $qb = $this->getCandidateProfiles($userId);
                    break;
                }
                else {
                    $qb = $this->getAllProfiles();
                    break;
                }
            }            
        }
      
        $adapter    = new DoctrineAdapter(new ORMPaginator($qb));
        
        $paginator  = new Paginator($adapter);
        $paginator->setDefaultItemCountPerPage(10);

        $page = 1;
        if ($this->params()->fromRoute('page')) $page = $this->params()->fromRoute('page');

        if($page) $paginator->setCurrentPageNumber($page);
     
        return new ViewModel(
                                array('paginator' => $paginator,
                                    ));
    }


    public function editAction()
    {
        $profile = new Profile;

        if ($this->params('id')) {
            $profile = $this->getEntityManager()->getRepository('Application\Entity\Profile')->find($this->params('id'));
        }

        $form = new ProfileForm($this->getEntityManager());
        $form->setHydrator(new DoctrineEntity($this->getEntityManager(),'Application\Entity\Profile'));
        $form->bind($profile);  

        $request = $this->getRequest();
        if ($request->isPost()) {

            $form->setInputFilter($profile->getInputFilter());
            $form->setData($request->getPost());
            
            //CHECKING IF USER IS AUTHENTICATED
            $auth = $this->getServiceLocator()->get('zfcuser_auth_service');

            if( $auth->hasIdentity() ){
                $user = $auth->getIdentity();
               
                $userId = $user->getId();

                if ($form->isValid()) {
                    
                    $em = $this->getEntityManager();
                    
                    $user = $em->find('FMCUser\Entity\User',$userId );

                    $profile->setUser($user);
                   
                    $em->persist($profile);
                    $em->flush();

                    $this->flashMessenger()->setNamespace('success')->addMessage('Profile Saved');
                    
                    return $this->redirect()->toRoute('application/default', array('controller' => 'profile','action' =>  'index'));
                }
            }            
        }

        return new ViewModel(array(
            'profile' => $profile,
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
        if ($this->params('id')) {            
            $profile = $this->getEntityManager()->getRepository('Application\Entity\Profile')->find($this->params('id'));          
        }
        
        $viewModel = new ViewModel(array(
            'profile' => $profile,
        ));

        return $viewModel;
    }


    /**
    * Delete action
    */
    public function deleteAction()
    {
        $profile = $this->getEntityManager()->getRepository('Application\Entity\Profile')->find($this->params('id'));
       
        if ($profile) {
            $em = $this->getEntityManager();
            $em->remove($profile);
            $em->flush();

            $this->flashMessenger()->setNamespace('success')->addMessage('Profile Deleted');
        }

        return $this->redirect()->toRoute('application/default', array('controller' => 'profile','action' =>  'index'));
    }

    public function getCandidateProfiles($userId)
    {
        $entityManager = $this->getEntityManager();
       
        $repository = $entityManager->getRepository('Application\Entity\Profile');
            
        $qb = $repository->createQueryBuilder('q');
        $qb->add('where', 'q.user = ?1 ')
            ->setParameter(1,$userId);
        return $qb;
    }

    public function getAllProfiles()
    {
        $entityManager = $this->getEntityManager();
       
        $repository = $entityManager->getRepository('Application\Entity\Profile');
            
        $qb = $repository->createQueryBuilder('q');       
       
        return $qb;
    }
}