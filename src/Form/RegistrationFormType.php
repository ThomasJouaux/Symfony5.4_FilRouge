<?php
namespace App\Form;


use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
    use App\Entity\User;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\Validator\Constraints\IsTrue;
    use Symfony\Component\Validator\Constraints\Length;
    use Symfony\Component\Validator\Constraints\NotBlank;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
    use Symfony\Component\Form\Extension\Core\Type\PasswordType;

    class RegistrationFormType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options): void
        {
            $builder
                ->add('email' , EmailType::class, [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'label' => 'E-Mail'           
                ])
                ->add('nom' , TextType::class, [
                                'attr' => [
                                    'class' => 'form-control'
                                ]
                ])
                ->add('prenom', TextType::class, [
                                'attr' => [
                                    'class' => 'form-control'
                                ],
                                'label' => 'Prénom' 
                ])
                ->add('adresse1', TextType::class, [
                                'attr' => [
                                    'class' => 'form-control'
                                ],
                                'label' => 'Adresse n°1' 
                ])
                ->add('adresse2', TextType::class, [
                                'attr' => [
                                    'class' => 'form-control'
                                ]
                                ,
                                'label' => 'Adresse n°2' 
                ])
                ->add('adresse3', TextType::class, [
                                'attr' => [
                                    'class' => 'form-control'
                                ],
                                'label' => 'Adresse n°3' 
                ])
                ->add('ville', TextType::class, [
                                'attr' => [
                                    'class' => 'form-control'
                                ],
                                'label' => 'Ville ' 
                ])
                ->add('pays' ,TextType::class, [
                                'attr' => [
                                    'class' => 'form-control'
                                ],
                                'label' => 'Pays' 
                ])
                ->add('codePostal', TextType::class, [
                                'attr' => [
                                    'class' => 'form-control'
                                ],
                                'label' => 'Code postale' 
                ])
                ->add('telephone' , TextType::class, [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'label' => 'Numero de téléphone'
                ])
                ->add('dateNaissance',DateType::class, [
                    'attr' => [
                        
                    ],
                    'label' => 'Date de naissance'
                ])
                ->add('image', FileType::class, [
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'label' => 'Choisissez votre image de profil !' 
                ])
                ->add('sexe' , TextType::class,[
                    'attr' => [
                        'class' => 'form-control'
                    ],
                    'label' => 'Sexe : H/F/A' 
                ])
                ->add('agreeTerms', CheckboxType::class, [
                    'mapped' => false,
                    'constraints' => [
                        new IsTrue([
                            'message' => 'You should agree to our terms.',
                        ]),
                    ],
                      'label' => 'En m\'inscrivant à ce site j\'accepte les CGU' 
                ])
                ->add('plainPassword', RepeatedType::class, [
                    'type' => PasswordType::class,
                    'invalid_message' => 'The password fields must match.',
                    'options' => ['attr' => [
                        'class' => 'form-control'

                    ]],
                    'required' => true,
                    'first_options'  => ['label' => 'Entrez un mot de passe'],
                    'second_options' => ['label' => 'Repetez le mot de passe'],
                    'mapped' => false,
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'class' => 'form-control'
                    ],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Please enter a password',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Your password should be at least {{ limit }} characters',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                    ],
                    
                ])
            ;
        }

        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                'data_class' => User::class,
            ]);
        }
    }
