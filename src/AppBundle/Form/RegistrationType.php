<?php

namespace AppBundle\Form;

use AppBundle\Entity\City;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'form.email',
                'translation_domain' => 'FOSUserBundle',
                'attr' => ['class' => 'input is-primary']
            ])
            ->add('name', null, [
                'label' => 'form.name',
                'translation_domain' => 'FOSUserBundle',
                'attr' => ['class' => 'input is-primary']
            ])
            ->add('surname', null, [
                'label' => 'form.surname',
                'translation_domain' => 'FOSUserBundle',
                'attr' => ['class' => 'input is-primary']
            ])
            ->add('username', null, [
                'label' => 'form.username',
                'translation_domain' => 'FOSUserBundle',
                'attr' => ['class' => 'input is-primary']
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'options' => [
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => [
                        'autocomplete' => 'new-password',
                    ],
                ],
                'first_options' => [
                    'label' => 'form.password',
                    'attr' => ['class' => 'input is-primary']
                ],
                'second_options' => [
                    'label' => 'form.password_confirmation',
                    'attr' => ['class' => 'input is-primary']
                ],
                'invalid_message' => 'fos_user.password.mismatch',
            ])
            ->add('country', CountryType::class, [
                'label' => 'form.country',
                'translation_domain' => 'FOSUserBundle',
                'attr' => ['class' => 'input is-primary']
            ])
            ->add('city', ChoiceType::class, [
                'choices' => [
                    new City('LT', 'Vilnius'),
                    new City('LT', 'Kaunas'),
                    new City('LT', 'Klaipeda'),
                    new City('LV', 'Riga'),
                ],
                'choice_value' => function (City $city = null) {
                    return $city ? $city->getName() : '';
                },
                'choice_label' => function (City $city) {
                    return $city->getName();
                },
                'choice_attr' => function (City $city) {
                    return ['country' => $city->getCountry()];
                },
                'label' => 'form.city',
                'translation_domain' => 'FOSUserBundle',
                'attr' => ['class' => 'input is-primary']
            ]);
    }

    /**
     * @return null|string
     */
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

    }

    /**
     * @return null|string
     */
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }
}