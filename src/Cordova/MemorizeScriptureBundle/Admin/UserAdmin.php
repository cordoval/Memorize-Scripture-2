<?php
namespace Cordova\MemorizeScriptureBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

use Cordova\MemorizeScriptureBundle\Entity\Session;

class UserAdmin extends Admin
{
    protected $list = array(
        'id' => array('identifier' => true),
        'firstName',
        'lastName',
        'posts',
        'sessions',
        'activesessionid',
    );

    protected $form = array(
        'id'  => array('edit' => 'list'),
        'firstName',
        'lastName',
        'posts',
        'sessions',
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