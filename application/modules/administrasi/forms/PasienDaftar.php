<?php

class Administrasi_Form_PasienDaftar extends EasyBib_Form
{

    public function init()
    {
        $this->setAttribs(array('class' => 'form-horizontal', 'id'=>'form-data-pasien'));
        $this->addElement('text', 'nama', array(
            'label' => 'Nama Pasien',
            'attribs' => array('class' => 'required', 'placeholder' => 'Tulis Nama Pasien')
        ));
        $this->addElement('text', 'tgllahir', array(
            'label' => 'Tanggal Lahir',
            'attribs' => array('class' => 'required', 'placeholder' => 'Tanggal Lahir pasien')
        ));
        $this->addElement('radio', 'jnskelamin', array(
            'label' => 'Jenis Kelamin',
            'multiOptions' => array('L' => 'Laki Laki', 'P' => 'Perempuan'),
            'attribs' => array('class' => 'required')
        ));
        $this->addElement('radio', 'goldarah', array(
            'label' => 'Golongan Darah',
            'multiOptions' => array('A' => 'A', 'B' => 'B', 'AB' => 'AB', 'O' => 'O', 'NA' => 'Tidak Tahu'),
            'attribs' => array('class' => 'required')
        ));
        $this->addElement('textarea', 'alamat', array(
            'label' => 'Alamat',
            'attribs' => array('class' => '', 'placeholder' => 'Alamat')
        ));
        $this->addElement('text', 'telepon', array(
            'label' => 'No Telepon',
            'attribs' => array('class' => '', 'placeholder' => 'Nomer Telepon Pasien')
        ));
        $this->addElement('text', 'email', array(
            'label' => 'Alamat Email',
            'attribs' => array('class' => '', 'placeholder' => 'Alamat Email')
        ));
        
        $this->addElement('textarea', 'catatan', array(
            'label' => 'Catatan Tambahan',
            'attribs' => array('class' => '', 'placeholder' => 'Catatan Tambahan')
        ));

        $this->addElement('submit', 'submit', array(
            'label' => 'Daftar',
            'attribs' => array('class' => 'btn btn-large btn-default'),
            'ignore' => true));

        $this->addDisplayGroup(array('nama', 'tgllahir', 'jnskelamin', 'goldarah', 'alamat',
                                                'telepon', 'email', 'catatan',  'submit'), 'data-pasien');
        $this->getDisplayGroup('data-pasien')->setLegend('Data Pasien');
        EasyBib_Form_Decorator::setFormDecorator($this, EasyBib_Form_Decorator::BOOTSTRAP, 'submit');
    }


}

