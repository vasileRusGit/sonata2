<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CategoryAdmin extends AbstractAdmin {

    protected function configureFormFields(FormMapper $formMapper) {
        // for loop years
        for ($i = 0; $i <= 50; $i++) {
            $time = new \DateTime('now');
            $years[] = $time->modify("-$i year")->format('Y');
        }

        $formMapper->add('product_name', 'text')
                ->add('car_mark', 'choice', array(
                    'choices_as_values' => true,
                    'choices' => array('Audi' => 'Audi', 'BMW' => 'BMW', 'Volfwagen' => 'Volfwagen'),
                    'required' => false))
                ->add('car_model', 'text')
                ->add('car_year', 'choice', array(
                    'choices' => $years))
                ->add('description', 'textarea')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('product_name');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('product_name')
                ->add('car_mark')
                ->add('car_model')
                ->add('car_year')
                ->add('description')
        ;
    }

}
