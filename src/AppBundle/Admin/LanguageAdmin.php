<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 10.04.17
 * Time: 11:44
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LanguageAdmin extends AbstractAdmin
{
    public function toString($object)
    {
        return $object->getName();
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('Languge', ['class' => 'col-md-8'])
            ->add('name', 'text')
            ->add('code', 'text')
        ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name')
            ->add('code');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
            'row_align' => 'left'))
            ->addIdentifier('name')
            ->addIdentifier('code');
    }
}