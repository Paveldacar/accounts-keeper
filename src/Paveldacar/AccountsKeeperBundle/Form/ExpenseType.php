<?php

namespace Paveldacar\AccountsKeeperBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExpenseType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('spentAt', 'date', [
                'widget' => 'single_text'
            ])
            ->add('cost')
            ->add('item')
            ->add('submit', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Paveldacar\AccountsKeeperBundle\Entity\Expense'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'paveldacar_accountskeeperbundle_expense';
    }
}
