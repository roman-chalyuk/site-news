<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 12.05.17
 * Time: 15:51
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ArticlesAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('Articles', ['class' => 'col-md-9'])
            ->add('title', 'textarea')
            ->add('content', 'textarea')
            ->end()
            ->with('Article places', ['class' => 'col-md-9'])
            ->add('domains', 'sonata_type_model', array(
                'property' => 'name', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
            ->add('language', 'sonata_type_model', array(
                'property' => 'code', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
            ->add('pages', 'sonata_type_model', array(
                'property' => 'name', 'by_reference' => false, 'multiple' => true, 'btn_add' => false))
            ->end()
            ->with('Article status', ['class' => 'col-md-4'])
            ->add('active', 'checkbox', ['required' => false])
            ->add('useDates', 'checkbox', ['required' => false])
            ->add('startDate', 'sonata_type_date_picker', ['format' => 'yyyy-MM-dd', 'dp_use_current' => true, 'required' => false])
            ->add('endDate', 'sonata_type_date_picker', ['format' => 'yyyy-MM-dd', 'dp_use_current' => true, 'required' => false])
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
//            ->add('mainLanguage');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
            'row_align' => 'left'));
        $listMapper->addIdentifier('title');
        $listMapper->add('content');
        $listMapper->add('category', null, ['associated_property' => 'name']);
        $listMapper->add('domain', null, ['associated_property' => 'name']);
        $listMapper->add('languages', null, ['associated_property' => 'code']);
        $listMapper->addIdentifier('active');
        $listMapper->add('publishDate');
    }
}