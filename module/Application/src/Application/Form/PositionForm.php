<?php
namespace Application\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;
use Zend\Form\Element;

class PositionForm extends Form
{
    public function __construct(EntityManager $em)
    {
        parent::__construct('position');

        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        $this->add(array(
            'name' => 'profile',
            'type'  => 'text',
            'options' => array('label' => 'profile'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'externalid',
            'type'  => 'text',
            'options' => array('label' => 'externalid'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));


        $this->add(array(
            'name' => 'title',
            'type'  => 'text',
            'options' => array('label' => 'title'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'summary',
            'type'  => 'text',
            'options' => array('label' => 'summary'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'companyname',
            'type'  => 'text',
            'options' => array('label' => 'companyname'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'companysize',
            'type'  => 'text',
            'options' => array('label' => 'companysize'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'companytype',
            'type'  => 'text',
            'options' => array('label' => 'companytype'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'industry',
            'type'  => 'text',
            'options' => array('label' => 'industry'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'city',
            'type'  => 'text',
            'options' => array('label' => 'city'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'country',
            'type'  => 'text',
            'options' => array('label' => 'country'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'startdate',
            'type'  => 'text',
            'options' => array('label' => 'startdate'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'enddate',
            'type'  => 'text',
            'options' => array('label' => 'enddate'),
            'attributes' => array(
                'class' => 'input-xxlarge'
            )
        ));

        $this->add(array(
            'name' => 'current',
            'type'  => 'text',
            'options' => array('label' => 'current'),
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
            ),
        ));
    }
}
