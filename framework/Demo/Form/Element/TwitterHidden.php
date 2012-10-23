<?php

/**
 * Hidden Element
 *
 * @author demo
 */
class Demo_Form_Element_TwitterHidden extends Zend_Form_Element_Hidden
{
    public function init(){
        $this->addDecorators(array(
            'ViewHelper',
            'Errors',
            array('Description'),
            array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => 'controls')),
            
            array(array('row' => 'Htmltag'), array('tag' => 'div', 'class' => 'control-group'))
        ));
        $this->addFilters(array('StringTrim'));
    }
}

