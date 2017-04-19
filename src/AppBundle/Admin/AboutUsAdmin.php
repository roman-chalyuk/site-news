<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 18.04.17
 * Time: 16:53
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AboutUsAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('AboutUs', ['class' => 'col-md-8'])
            ->add('language', 'sonata_type_model', array(
                'property' => 'code', 'by_reference' => false, 'multiple' => false, 'btn_add' => false))
            ->add('description', 'textarea')
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $choices = $this->getConfigurationPool()->getContainer()->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Language')->findAll();
        $codes = [];

        foreach ($choices as $id => $code)
        {
            $codes[$code->getCode()] = $code->getCode();
        }

        $datagridMapper->add('language', 'doctrine_orm_string', ['show_filter' => true],
            'choice', ['choices' => $codes]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('id', null, array(
            'row_align' => 'left'));
        $listMapper->addIdentifier('language', null, ['associated_property' => 'code']);
        $listMapper->addIdentifier('description');
    }
}