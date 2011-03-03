<?php

require_once('common/plugin/PluginDescriptor.class.php');


/**
 * Copyright (c) Xerox Corporation, Codendi Team, 2001-2009. All rights reserved
 * 
 * 
 *
 * ServerUpdatePluginDescriptor
 */
class ServerUpdatePluginDescriptor extends PluginDescriptor {
    
    function __construct() {
        $name        = $GLOBALS['Language']->getText('plugin_serverupdate', 'descriptor_name');
        $description = $GLOBALS['Language']->getText('plugin_serverupdate', 'descriptor_description');
        parent::__construct($name, false, $description);
        $this->setVersionFromFile(dirname(__FILE__).'/../VERSION');
    }
    
}
?>