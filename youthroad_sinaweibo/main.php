<?php
require_once('./common/define.php');
require_once('./common/config.php');
require_once('./common/function.php');


Globals::requireClass('Controller');
Controller::runController("main", $config);
