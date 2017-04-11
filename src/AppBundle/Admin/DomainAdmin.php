<?php

/**
 * Created by PhpStorm.
 * User: roman
 * Date: 10.04.17
 * Time: 11:41
 */
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class DomainAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('Domain', ['class' => 'col-md-8'])
            ->add('name', 'text')
            ->add('languages', 'sonata_type_model', array(
                'property' => 'code', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
            ->add('mainLanguage', 'sonata_type_model', array(
                'property' => 'code', 'by_reference' => false, 'multiple' => false, 'btn_add' => false))
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
//            ->add('mainLanguage');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
            'row_align' => 'left'));
        $listMapper->addIdentifier('name');
        $listMapper->addIdentifier('languages', null, ['associated_property' => 'code']);
        $listMapper->addIdentifier('mainLanguage', null, ['associated_property' => 'code']);
    }
}
