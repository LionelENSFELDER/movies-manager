<?php
    require_once('./load.php');

    $ctrl = new AuthController();
    echo $ctrl->login();
