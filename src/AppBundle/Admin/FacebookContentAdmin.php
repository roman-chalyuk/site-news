<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 30.05.17
 * Time: 14:16
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class FacebookContentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('FacebookContent', ['class' => 'col-md-10'])
            ->add('title', 'textarea')
            ->add('link', 'textarea')
            ->end()
            ->with('Location', ['class' => 'col-md-10'])
            ->add('domains', 'sonata_type_model', array(
                'property' => 'name', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
            ->add('pages', 'sonata_type_model', array(
                'property' => 'name', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
            ->add('languages', 'sonata_type_model', array(
                'property' => 'code', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
            ->end()
            ->with('Status', ['class' => 'col-md-4'])
            ->add('active', 'checkbox', ['required' => false])
            ->add('publishDate', 'sonata_type_date_picker', ['format' => 'yyyy-MM-dd', 'dp_use_current' => true, 'required' => false])
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title', null, ['show_filter' => true])
            ->add('link', null, ['show_filter' => true]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
            'row_align' => 'left'))
            ->addIdentifier('title')
            ->addIdentifier('link')
            ->add('domains', null, ['associated_property' => 'name'])
            ->add('pages', null, ['associated_property' => 'name'])
            ->add('language', null, ['associated_property' => 'code'])
            ->addIdentifier('active')
            ->add('publishDate');
    }
}