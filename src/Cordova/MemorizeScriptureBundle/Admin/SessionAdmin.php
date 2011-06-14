<?php
namespace Cordova\MemorizeScriptureBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

use Cordova\MemorizeScriptureBundle\Entity\SessionVerse;

class SessionAdmin extends Admin
{
    protected $list = array(
        'id' => array('identifier' => true),
        'title',
        //'sessionverses',
        'createdAt',
        'updatedAt',
        'user',
    );

    protected $form = array(
        'id'  => array('edit' => 'list'),
        'title',
        //'sessionverses',
        'createdAt',
        'updatedAt',
        'user',
    );

    protected $filter = array(
        'title',
    );

    public function configureFormFields(FormMapper $formMapper)
    {

    }
}