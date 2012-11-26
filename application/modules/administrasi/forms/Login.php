<?php

class Administrasi_Form_Login extends Zend_Form
{

    public function init()
    {
        $this->addElement('text', 'username', array(
            'label' => 'Username',
            'required' => true,
            'validators' => array(),
            'filters' => array(),
            'attribs' => array('placeholder' => 'Username')
        ));
        $this->addElement('password', 'password', array(
            'label' => 'Password',
            'required' => true,
            'validators' => array(),
            'filters' => array(),
            'attribs' => array('placeholder' => 'Username')
        ));
        $this->addElement('submit', 'submit', array(
            'label' => 'Login',
            'ignore' => true
        ));
    }


}

