<?php
/**
*   MWBTab_PHP CLI
*   
*
*/


/**
*   Load dependencies
*/
require_once '../MWB.php';
require_once '../API.php';
require_once '../IO.php';

/**
*   Setup 
*/
$MWB = new MWB\MWB;
$IO = new MWB\IO;
$API = new MWB\API;

$MWB->setAPI($API);
$MWB->setIO($IO);


/**
*   Collect user input (5 arguments)
*/



/**
*   Output the data to command line
*/

$MWB->call();
