<?php

require_once dirname(__FILE__).'/../library/php-activerecord/ActiveRecord.php';
 //initializing connection
    ActiveRecord\Config::initialize(function($cfg)
    {
     $cfg->set_model_directory(dirname(__FILE__).'/../models');
     $cfg->set_connections(array(
         'development' => 'mysql://root:secret@mysql-server/mydatabase'));
    });
?>