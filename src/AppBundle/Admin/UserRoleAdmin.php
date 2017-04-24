<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 21.04.17
 * Time: 12:30
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserRoleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('UserRole', ['class' => 'col-md-8'])
            ->add('name', 'text')
            ->add('description', 'textarea')
        ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
            'row_align' => 'left'));
        $listMapper->addIdentifier('name');
        $listMapper->addIdentifier('description');
    }
}