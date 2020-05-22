<?php
namespace app\modules;

use std, gui, framework, app;


class MainModule extends AbstractModule
{

    /**
     * @event scoreboard.action 
     */
    function doScoreboardAction(ScriptEvent $e = null)
    {    
        $now = Time::now();
        $this->messaScoreboard->text = $now->toString('hh:mm:ss');
    }




    /**
     * @event systemTray.construct 
     */
    function doSystemTrayConstruct(ScriptEvent $e = null)
    {    
        $this->systemTray->displayMessage('Панель Encore', 'Для удобства программа добавлена в трей');
    }


    /**
     * @event systemTray.click-Left 
     */
    function doSystemTrayClickLeft(UXMouseEvent $e = null)
    {    
        if (app()->form('MainPanel')->visible == true) {
        Animation::fadeOut(app()->form('MainPanel'), 750, function () use ($e, $event) {app()->hideForm('MainPanel');});
        } else {
        app()->showForm('MainPanel');
        }
    }

    /**
     * @event systemTray.click-Right 
     */
    function doSystemTrayClickRight(UXMouseEvent $e = null)
    {    
        $this->systemTray->visible = false;
        app()->shutdown();
    }

}
