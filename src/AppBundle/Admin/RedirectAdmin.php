<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 10.04.17
 * Time: 12:41
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RedirectAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('Redirect', ['class' => 'col-md-8'])
            ->add('sourceUri', 'text')
            ->add('destinationUri', 'text')
            ->add('statusCode', 'integer')
        ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('sourceUri');
        $datagridMapper->add('destinationUri');
        $datagridMapper->add('statusCode');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id');
        $listMapper->add('sourceUri', 'url');
        $listMapper->add('destinationUri', 'url');
        $listMapper->add('statusCode', null, array(
                'row_align' => 'left'));
    }
}