<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 19.04.17
 * Time: 15:30
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MetaTagPageAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('MetaTagPage', ['class' => 'col-md-8'])
            ->add('domain', 'sonata_type_model', array(
                'property' => 'name', 'btn_add' => false))
            ->add('page', 'sonata_type_model', array(
                'property' => 'name', 'btn_add' => false))
            ->add('metaTagName', 'sonata_type_model', array(
                'property' => 'name', 'btn_add' => 'Add new name'))
            ->add('metaTagContent', 'sonata_type_model', array(
                'property' => 'content', 'required' => false, 'placeholder' => 'Select',
                'btn_add' => 'Add new content'))
            ->add('lang', 'sonata_type_model', array(
                'property' => 'code', 'btn_add' => false))
            ->add('newsCategory', 'sonata_type_model', array(
                'property' => 'name', 'btn_add' => false))
            ->end();
    }

//    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
//    {
//        $datagridMapper->add('name');
//    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
            'row_align' => 'left'));
        $listMapper->add('domain', null, ['associated_property' => 'name']);
        $listMapper->add('page', null, ['associated_property' => 'name']);
        $listMapper->addIdentifier('metaTagName', null, ['associated_property' => 'name']);
        $listMapper->addIdentifier('metaTagContent', null, ['associated_property' => 'content']);
        $listMapper->add('lang', null, ['associated_property' => 'code']);
        $listMapper->add('newsCategory', null, ['associated_property' => 'name']);
    }
}