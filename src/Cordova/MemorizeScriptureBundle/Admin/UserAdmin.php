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
        
        'title' => array('identifier' => true),
        'author',
        'enabled',
        'commentsEnabled',
    );

    protected $form = array(
        'author'  => array('edit' => 'list'),
        'enabled' => array('form_field_options' => array('required' => false)),
        'title',
        'abstract',
        'content',
        'tags'     => array('form_field_options' => array('expanded' => true)),
        'commentsCloseAt',
        'commentsEnabled' => array('form_field_options' => array('required' => false)),
    );

    protected $filter = array(
        'title',
        'enabled',
        'tags' => array('filter_field_options' => array('expanded' => true, 'multiple' => true))
    );

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
          ->add('author')
          ->add('image', array(), array('edit' => 'list', 'link_parameters' => array('context' => 'news')))
          ->add('commentsDefaultStatus', array('choices' => Comment::getStatusList()), array('type' => 'choice'));
    }
}