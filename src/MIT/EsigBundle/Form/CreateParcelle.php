<?php
namespace MIT\EsigBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateParcelle extends AbstractType
{
     public function buildForm(FormBuilderInterface $builder, array $options)
    {
         //içi nous allons faire notre formulaire en PHP
         $builder
                 ->add('Num_Parcelle','text')
                 ->add('Num_Marche','text')
                 ->add('GPS','file')
                 ->add('Nom_Proprietaire','text',array('required' => false))
                 ->add('Superficie')  ;              
    }
    
    
    public function getName() {
        return 'parcelles_parcellebundle_test';
    }
    
}

 
        