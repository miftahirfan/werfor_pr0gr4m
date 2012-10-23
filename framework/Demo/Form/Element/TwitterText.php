<?php

/**
 * Form input decorators based on twitter-bootstrap
 * 
 * @category   Demo
 * @package    Demo_Form
 * @subpackage Demo_Form_Element
 * @author     heaven-dragon <poweredby.zendframework@gmail.com>
 */

class Demo_Form_Element_TwitterText extends Zend_Form_Element_Text
{
    public function init()
    {
        $this->addDecorators(array(
            'ViewHelper',
            'Errors',
            array('Description', array('tag' => 'p', 'class' => 'help-block')),
            array(array('data' => 'HtmlTag'), array('tag' => 'div', 'class' => 'controls')),            
            array('Label', array('class' => 'control-label')), 
            array(array('row' => 'Htmltag'), array('tag' => 'div', 'class' => 'control-group'))            
        ));
    }
}