<?php

use Elementor\Widget_Base;

class title extends  Widget_Base{


    public function get_name()
    {
        return "title_";
    }    
    public function get_title()
    {
        return __('Title','Widget-name');
    }
    public function get_icon()
    {
        return 'fa fa-code' ;
    }
    public function get_categories()
    {
        return ['custome'];
    }


}
?>