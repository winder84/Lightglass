<?php
/**
 * Created by JetBrains PhpStorm.
 * User: winder
 * Date: 20.04.13
 * Time: 20:35
 * To change this template use File | Settings | File Templates.
 */
unlink($_SERVER['DOCUMENT_ROOT'] . "/img/" . $_REQUEST['name']);
echo 'success';