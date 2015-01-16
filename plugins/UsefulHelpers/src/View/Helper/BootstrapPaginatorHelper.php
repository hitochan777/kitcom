<?php

namespace UsefulHelpers\View\Helper;

use Cake\View\Helper\PaginatorHelper;

class BootstrapPaginatorHelper extends PaginatorHelper {


    public function __construct ($view, $config = []) {
        $this->templates([
            'nextActive' => '<li><a href="{{url}}">{{text}}</a></li>',
            'nextDisabled' => '<li class="disabled"><a>{{text}}</a></li>',
            'prevActive' => '<li><a href="{{url}}">{{text}}</a></li>',
            'prevDisabled' => '<li class="disabled"><a>{{text}}</a></li>',
            'first' => '<li><a href="{{url}}">{{text}}</a></li>',
            'last' => '<li><a href="{{url}}">{{text}}</a></li>',
            'number' => '<li><a href="{{url}}">{{text}}</a></li>',
            'current ' => '<li class="active"><a href="{{url}}">{{text}}</a></li>'
        ]);
        
        parent::__construct($view, $config);
    }
    
    /**
     * 
     * Get pagination link list.
     * 
     * @param $options Options for link element
     *
     * Extra options:
     *  - size small/normal/large (default normal)
     *       
    **/
    public function numbers (array $options = array()) {       
        
        $class = 'pagination' ;

        if (isset($options['class'])) {
            $class .= ' '.$options['class'] ;
            unset($options['class']) ;
        }
        
        if (isset($options['size'])) {
            switch ($options['size']) {
            case 'small':
                $class .= ' pagination-sm' ;
                break ;
            case 'large':
                $class .= ' pagination-lg' ;
                break ;
            }
            unset($options['size']) ;
        }
          
        $options['before'] = '<ul class="'.$class.'">' ;
        $options['after'] = '</ul>' ;

        if (isset($options['prev'])) {
            $options['before'] .= $this->prev($options['prev']) ;
        }

        if (isset($options['next'])) {
            $options['after'] = $this->next($options['next']).$options['after'] ;
        }
                
        return parent::numbers ($options) ;
    }


}

?>
