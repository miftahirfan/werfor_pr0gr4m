<?php

/**
 * Form layout based on bootstrap twitter
 * 
 * @category Demo
 * @package  Demo_Form
 * @author   heaven-dragon <poweredby.zendframework@gmail.com>
 */

class Demo_Form_TwitterVertical extends ZendX_JQuery_Form
{
    protected $_style = 'form-vertical';
    public function init()
    {
        $this->addPrefixPath('Demo_Form_Element', 'Demo/Form/Element/', 'element');        
        $this->setMethod('post');

        $this->addElement('twitterSubmit', 'submit', array(
            'label' => 'Save',
            'ignore' => true,
            'order' => 100
        ));
    }

    public function loadDefaultDecorators()
    {
        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'fieldset')),
            array('Form', array('class' => $this->_style))
        ));
    }
    
}