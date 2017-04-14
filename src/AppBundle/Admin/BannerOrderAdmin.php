<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 13.04.17
 * Time: 15:18
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BannerOrderAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('BannerOrder', ['class' => 'col-md-6'])
//            ->add('Banner order values should be divided into 10.', null)
            ->add('orderVal', 'integer')
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('orderVal');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
            'row_align' => 'left'));
        $listMapper->addIdentifier('orderVal', null, array(
            'row_align' => 'left'));
    }
}