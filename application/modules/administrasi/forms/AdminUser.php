<?php

class Administrasi_Form_AdminUser extends EasyBib_Form
{

    public function init()
    {
        $this->setAttribs(array('class' => 'form-horizontal', 'id'=>'init-user'));

        $this->addElement('text', 'username', array(
            'label' => 'Username',
            'required' => true,
            'attribs' => array('class' => 'required unique',
                               'placeholder' => 'Tulis Username')));
        $this->addElement('text', 'namalengkap', array(
            'label' => 'Nama Lengkap',
            'required' => true,
            'attribs' => array('class' => 'required', 'placeholder' => 'Tulis Nama lengkap')));

        $this->addElement('password', 'password', array(
            'label' => 'Password',
            'required' => true,
            'attribs' => array('class' => 'required', 'minlength' => 6, 'placeholder' => 'Tulis Password')));

        $this->addElement('password', 'confirm', array(
            'label' => 'Confirm Password',
            'attribs' => array('class' => 'required', 'minlength' => 6, 'equalTo' => '#password', 'placeholder' => 'Tulis kembali passwordnya')));

        $this->addElement('submit', 'submit', array(
            'label' => 'Simpan',
            'attribs' => array('class' => 'btn btn-large btn-default'),
            'ignore' => true));

        //$this->addDisplayGroup(array('username', 'namalengkap', 'password', 'confirm',  'submit'), 'user-data');
        //$this->getDisplayGroup('user-data')->setLegend('Admin User');
        //EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submit');
    }


}

