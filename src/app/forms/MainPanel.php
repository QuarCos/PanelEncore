<?php
namespace app\forms;

use windows;
use std, gui, framework, app;


class MainPanel extends AbstractForm
{


    /**
     * @event google.click-Left 
     */
    function doGoogleClickLeft(UXMouseEvent $e = null)
    {    
        if (app()->form('SearchPanel')->visible == true) {
        Animation::fadeOut(app()->form('SearchPanel'), 750, function () use ($e, $event) {app()->hideForm('SearchPanel');});
        } else {
        app()->showForm('SearchPanel');
        }
    }

    /**
     * @event showing 
     */
    function doShowing(UXWindowEvent $e = null)
    {    
        $this->opacity = 0.0;
        Animation::fadeTo($this, 250, 1.0);
        
        $this->panelAlt->opacity = 0.0;
        $this->panel3->opacity = 0.0;
    }




    /**
     * @event sound.click-Left 
     */
    function doSoundClickLeft(UXMouseEvent $e = null)
    {    
        execute('nircmd.exe mutesysvolume 2');
        if ($this->sound->opacity == 1){
$this->sound->opacity = 0.5;
        } else {
            $this->sound->opacity = 1;
        }
    }


    /**
     * @event construct 
     */
    function doConstruct(UXEvent $e = null)
    {    
        if (fs::exists('nircmd.exe')) {
        } else {
        fs::copy('res://.data/nircmd.exe','nircmd.exe');
        }
    }

    /**
     * @event panelAlt.construct 
     */
    function doPanelAltConstruct(UXEvent $e = null)
    {    
        $this->opacity = 0.0;
    }

    /**
     * @event imageAlt.click-Left 
     */
    function doImageAltClickLeft(UXMouseEvent $e = null)
    {    
        if ($this->panelAlt->opacity == 1) {
        Animation::fadeOut($this->panelAlt, 450); Animation::moveTo($this->panelAlt, 450, 480, 0);
        } else {
        Animation::fadeIn($this->panelAlt, 450); Animation::moveTo($this->panelAlt, 450, 480, 40);
        }
    }

    /**
     * @event image3.click-Left 
     */
    function doImage3ClickLeft(UXMouseEvent $e = null)
    {    
        execute('explorer.exe');
    }

    /**
     * @event soundVolume.mouseDrag 
     */
    function doSoundVolumeMouseDrag(UXMouseEvent $e = null)
    {
        $vol = $this->soundVolume->value * 655.35;
         execute('nircmd.exe'.' setsysvolume '.$vol);
    }

    /**
     * @event image.click-Left 
     */
    function doImageClickLeft(UXMouseEvent $e = null)
    {
        if ($this->panel3->opacity == 1) {
        Animation::fadeOut($this->panel3, 450); Animation::moveTo($this->panel3, 450, 600, 0);
        } else {
        Animation::fadeIn($this->panel3, 450); Animation::moveTo($this->panel3, 450, 600, 40);
        }
    }

    /**
     * @event image4.click-Left 
     */
    function doImage4ClickLeft(UXMouseEvent $e = null)
    {
        execute('control.exe');
    }




}
