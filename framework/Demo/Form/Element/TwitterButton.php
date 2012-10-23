<?php

/**
 * Button Element 
 *
 * @author demo
 */
class Demo_Form_Element_TwitterButton extends Zend_Form_Element_Button
{
    public function init(){
        $this->addDecorators(array(
            'ViewHelper',
            'Errors',            
            array('Description', array('tag' => 'p', 'class' => 'help-block')),
            array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => 'controls')),             
            array(array('row' => 'Htmltag'), array('tag' => 'div', 'class' => 'control-group'))             
        ));
    }
}

