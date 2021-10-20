<?php

namespace App\Form;

use App\Entity\Contact;
use Proxies\__CG__\App\Entity\Categoriee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
/**
     * permet d'avoir la configuration de base d'un champ ! 
     *
     * @param [type] $label
     * @param [type] $placeholder
     * @param array $options
     * @return array
     */
    private function getConfiguration($label, $placeholder, $options =[]){
        return array_merge([
            'label' => $label,
            'attr' => [
                'placeholder' => $placeholder
            ]
            
            ], $options);
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, $this->getConfiguration("Nom", "Tapez votre nom"))
            ->add('prenom', TextType::class, $this->getConfiguration("Prenom", "Tapez votre prenom"))
            ->add('adresseMail', TextType::class, $this->getConfiguration("adresse mail", "Donnez l'adresse mail"))

            ->add('ville', TextType::class, $this->getConfiguration("Adresse", "Donnez votre adresse si vous le voulez", [
                'required' => false
            ]))
            ->add('codePostal', TextareaType::class, $this->getConfiguration("Code Postal", "Donnez votre code postal si vous le voulez", [
                'required' => false
            ]))
            ->add('avatar', UrlType::class, $this->getConfiguration("Url de l'image principale", "Donnez l'adresse d'une image qui donne vraiment envie.", [
                'required' => false
            ]))
            ->add('numTel', IntegerType::class, $this->getConfiguration("Numéro de téléphone", "Donnez votre numéro de téléphone si vous le voulez", [
                'required' => false
            ]))
            ->add('categorie', EntityType::class, [
                'class' => Categoriee::class,
                'choice_label' => 'designation',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
