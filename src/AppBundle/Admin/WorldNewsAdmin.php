<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 30.05.17
 * Time: 14:17
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class WorldNewsAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('WorldNews', ['class' => 'col-md-10'])
            ->add('title', 'textarea')
            ->add('smallContent', 'sonata_simple_formatter_type', array(
                'format' => 'richhtml',
                'ckeditor_context' => 'news_articles'))
            ->add('content', 'sonata_simple_formatter_type', array(
                'format' => 'richhtml',
                'ckeditor_context' => 'news_articles'
            ))
            ->add('videos', 'sonata_type_model',
                ['by_reference' => false, 'multiple' => true, 'btn_add' => false])
            ->add('category', 'sonata_type_model', array(
                'property' => 'name', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
            ->end()
            ->with('Places', ['class' => 'col-md-10'])
            ->add('domains', 'sonata_type_model', array(
                'property' => 'name', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
            ->add('language', 'sonata_type_model', array(
                'property' => 'code', 'by_reference' => false, 'multiple' => false, 'btn_add' => false))
            ->end()
            ->with('Status', ['class' => 'col-md-4'])
            ->add('active', 'checkbox', ['required' => false])
            ->add('publishDate', 'sonata_type_date_picker', ['format' => 'yyyy-MM-dd', 'dp_use_current' => true, 'required' => false])
            ->add('forceFirst', 'checkbox', ['required' => false])
            ->add('forceFirstDate', 'sonata_type_date_picker', ['format' => 'yyyy-MM-dd', 'dp_use_current' => true, 'required' => false])
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
            'row_align' => 'left'))
            ->addIdentifier('title')
//            ->add('content')
            ->add('category', null, ['associated_property' => 'name'])
            ->add('domains', null, ['associated_property' => 'name'])
            ->add('language', null, ['associated_property' => 'code'])
            ->addIdentifier('active')
            ->add('publishDate')
            ->add('forceFirst')
            ->add('forceFirstDate');
    }
}