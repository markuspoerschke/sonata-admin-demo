<?php

namespace PhpDus\Bundle\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\FieldDescriptionInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CompanyAdmin extends Admin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name')
            ->add('website', 'url', [
                'required' => false,
            ]);
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name')
            ->add('website');
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('name');
    }
}
