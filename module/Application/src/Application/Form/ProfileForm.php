<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;
use Zend\Form\Element;

class ProfileForm extends Form
{
    public function __construct(EntityManager $em)
    {
        parent::__construct('profile');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'firstname',
            'type'  => 'text',
            'options' => array('label' => ''),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'middlename',
            'type'  => 'text',
            'options' => array('label' => ''),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));


        $this->add(array(
            'name' => 'lastname',
            'type'  => 'text',
            'options' => array('label' => ''),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'address1',
            'type'  => 'textarea',
            'options' => array('label' => ''),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'address2',
            'type'  => 'textarea',
            'options' => array('label' => ''),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));






        $this->add(array(
            'name' => 'notes',
            'type'  => 'text',
            'options' => array('label' => 'Notes'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

 

       

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Save',
                'id' => 'submitbutton',
                'class' => 'btn btn-primary',
            ),
        ));
    }
}
