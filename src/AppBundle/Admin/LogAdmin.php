<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 18.04.17
 * Time: 16:31
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LogAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        return;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('channel', 'doctrine_orm_string', ['show_filter' => true],
            'choice', ['choices' => \AppBundle\Entity\Log::getChannelsList()]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
            'row_align' => 'left'));
        $listMapper->addIdentifier('message');
        $listMapper->addIdentifier('channel');
        $listMapper->addIdentifier('datetime');
    }
}