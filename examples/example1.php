<?php
/**
*   Examples
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
*   Example:  Reading one article
*/
$article_id = 1

$MWB->setArticleID($article_id);
$MWB->setInputType('mtab');
$MWB->setOutputType('txt');

$results = $MWB->call();

?><?php
print_r($results);
?><?php


/**
*   Example:  Reading multiple articles
*/

$MWB->setArticleIDs(array(1,2);
$MWB->setInputType('mtab');
$MWB->setOutputType('txt');

$results = $MWB->call();

?><?php
print_r($results);
?><?php
