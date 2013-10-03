<?php

namespace PYCA\Form;

use Symfony\Component\Validator\Constraints as Assert;

class DrunkTextForm extends FormAbstract
{
    public function build($data = array(), $options = array())
    {
        $form = $this->factory->createBuilder('form', $data)
            ->add('phonenumber', 'text', array(
                    'label'       => 'Area Code for Phone Number',
                    'constraints' => array(new Assert\NotBlank(), new Assert\Length(array('min' => 3, 'max' => 3)))
                ))
            ->add('message', 'textarea', array(
                    'label'       => 'Text Message',
                    'constraints' => array(new Assert\NotBlank())
                ))
        ;

        return $form->getForm();
    }
}