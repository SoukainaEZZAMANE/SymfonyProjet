<?php

namespace MIT\EsigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ParcelleType extends AbstractType
{
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MIT\EsigBundle\Entity\Parcelle'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'mit_esigbundle_parcelle';
    }
}
