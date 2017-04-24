<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 20.04.17
 * Time: 16:20
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('User', ['class' => 'col-md-8'])
            ->add('username', 'text')
            ->add('email', 'text')
            ->add('enabled', 'checkbox', ['required' => false])
            ->add('roles', null, ['required' => false, 'delete_empty' => false])
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('username');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array('row_align' => 'left'))
            ->addIdentifier('username')
            ->add('email')
            ->add('lastLogin')
            ->add('roles', null, ['template' => 'AppBundle:Custom:user_roles.html.twig'])
            ->add('enabled');
    }
}