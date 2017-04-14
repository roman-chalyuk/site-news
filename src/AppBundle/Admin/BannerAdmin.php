<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 13.04.17
 * Time: 15:17
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BannerAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('Banner', ['class' => 'col-md-9'])
            ->add('name', 'text')
            ->add('code', 'textarea')
        ->end()
        ->with('Banner priority', ['class' => 'col-md-4'])
            ->add('bannerPlaces', 'sonata_type_model', array(
                'property' => 'name', 'by_reference' => true, 'multiple' => false, 'btn_add' => false))
            ->add('bannerOrders', 'sonata_type_model', array(
                'property' => 'orderVal', 'by_reference' => true, 'multiple' => false, 'btn_add' => false))
        ->end()
        ->with('Banner status', ['class' => 'col-md-4'])
            ->add('active', 'checkbox', ['required' => false])
            ->add('useDates', 'checkbox', ['required' => false])
            ->add('startDate', 'sonata_type_date_picker', ['format' => 'yyyy-MM-dd', 'dp_use_current' => true, 'required' => false])
            ->add('endDate', 'sonata_type_date_picker', ['format' => 'yyyy-MM-dd', 'dp_use_current' => true, 'required' => false])
        ->end()
        ->with('Banner places', ['class' => 'col-md-10'])
            ->add('languages', 'sonata_type_model', array(
                'property' => 'code', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
            ->add('domains', 'sonata_type_model', array(
                'property' => 'name', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
            ->add('pages', 'sonata_type_model', array(
                'property' => 'name', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
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
        $listMapper->add('domains', null, ['associated_property' => 'name']);
        $listMapper->add('pages', null, ['associated_property' => 'name']);
        $listMapper->add('bannerPlaces', null, ['associated_property' => 'name']);
        $listMapper->add('bannerOrders', null, ['associated_property' => 'orderVal']);
        $listMapper->add('languages', null, ['associated_property' => 'code']);
        $listMapper->addIdentifier('active');
    }
}