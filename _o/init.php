<?php

require_once(dirname(__FILE__) . '/conf.php');

require_once($conf['dir']['libs'] . "/App.php");
require_once($conf['dir']['libs'] . "/SessionData.php");
require_once($conf['dir']['libs'] . "/DB.php");
require_once($conf['dir']['libs'] . "/Cypher.php");
require_once($conf['dir']['libs'] . "/CurlCache.php");
require_once($conf['dir']['libs'] . "/Cache.php");
require_once($conf['dir']['libs'] . "/Error.php");
require_once($conf['dir']['libs'] . "/JSON.php");
require_once($conf['dir']['libs'] . "/Controller.php");
require_once($conf['dir']['libs'] . "/Model.php");
require_once($conf['dir']['libs'] . "/View.php");

new App($conf);




?>