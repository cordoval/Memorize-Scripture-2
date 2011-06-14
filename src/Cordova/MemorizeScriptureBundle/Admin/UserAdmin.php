<?php
namespace Cordova\MemorizeScriptureBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

use Cordova\MemorizeScriptureBundle\Entity\Session;

class UserAdmin extends Admin
{
    /*protected $list = array(
        'id' => array('identifier' => true),
        'firstName',
        'lastName',
        'activesessionid',
    );*/

    protected function configureListFields(ListMapper $list) // optional
    {
          $list->add('id', array('identifier' => true, 'type' => 'string'));
          $list->add('firstName', array('type' => 'string'));
          $list->add('lastName', array('type' => 'string'));
          $list->add('activesessionid', array('type' => 'string'));
    }

    protected $form = array(
        'id'  => array('edit' => 'list'),
        'firstName',
        'lastName',
        //'sessions',
        'activesessionid',
    );

    protected $filter = array(
        'firstName',
        'lastName',
    );

    public function configureFormFields(FormMapper $formMapper)
    {

    }
}