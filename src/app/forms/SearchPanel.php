<?php
namespace app\forms;

use std, gui, framework, app;


class SearchPanel extends AbstractForm
{


    /**
     * @event search.click-Left 
     */
    function doSearchClickLeft(UXMouseEvent $e = null)
    {    
        $search = str::replace($this->lineSearch->text,' ','+');
        browse('http://www.google.com/search?'.'q='.$search);
    }

    /**
     * @event lineSearch.globalKeyDown-Enter 
     */
    function doLineSearchGlobalKeyDownEnter(UXKeyEvent $e = null)
    {    
        $search = str::replace($this->lineSearch->text,' ','+');
        browse('http://www.google.com/search?'.'q='.$search);
    }


    /**
     * @event showing 
     */
    function doShowing(UXWindowEvent $e = null)
    {    
        $this->opacity = 0.0;
        Animation::fadeTo($this, 250, 1.0);
    }

    /**
     * @event cancel.click-Left 
     */
    function doCancelClickLeft(UXMouseEvent $e = null)
    {    
        Animation::fadeOut(app()->form('SearchPanel'), 750, function () {
            app()->hideForm('SearchPanel');
        });
    }




}
