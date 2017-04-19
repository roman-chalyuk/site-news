<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 19.04.17
 * Time: 15:29
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MetaTagContentAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
    $formMapper->with('MetaTag', ['class' => 'col-md-8'])
        ->add('content', 'textarea')
    ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('content');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array('row_align' => 'left'));
        $listMapper->addIdentifier('content');
    }
}