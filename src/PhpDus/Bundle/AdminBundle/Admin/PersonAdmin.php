<?php

namespace PhpDus\Bundle\AdminBundle\Admin;

use PhpDus\Bundle\AdminBundle\Entity\Address;
use PhpDus\Bundle\AdminBundle\Entity\Person;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PersonAdmin extends Admin
{
    protected function configureFormFields(FormMapper $form)
    {
        $form
            ->add('name')
            ->add('birthdate', 'birthday')
            ->with('Contact')
                ->add('email')
                ->add('company')
            ->end()
            ->with('Addresses')
                ->add('addresses', 'sonata_type_collection',
                    ['by_reference' => false],
                    [
                        'edit'               => 'inline',
                        'inline'             => 'table',
                    ])
            ->end()
            ->with('Skills')
                ->add('skills')
            ->end();
    }

    protected function configureListFields(ListMapper $list)
    {
        $list
            ->addIdentifier('name')
            ->add('email')
            ->add('skills');
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('name')
            ->add('skills')
            ->add('company');
    }

    /**
     * @param Person $person
     */
    public function preUpdate($person)
    {
        /** @var Address $address */
        foreach ($person->getAddresses() as $address)
        {
            $address->setPerson($person);
        }
    }

    /**
     * @param Person $person
     */
    public function prePersist($person)
    {
        /** @var Address $address */
        foreach ($person->getAddresses() as $address)
        {
            $address->setPerson($person);
        }
    }
}
