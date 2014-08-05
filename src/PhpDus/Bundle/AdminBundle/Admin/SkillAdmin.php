<?php

namespace PhpDus\Bundle\AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class SkillAdmin extends Admin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name');
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name');
    }
}
