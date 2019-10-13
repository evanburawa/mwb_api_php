<?php
// Turn Errors On
error_reporting( E_ALL );
ini_set( "display_errors", 1 );


/**
*   Examples
*/

/**
*   Load dependencies
*/
require_once '../MWB.php';
require_once '../API.php';
require_once '../IO.php';


//$url ="https://www.metabolomicsworkbench.org/rest/study/analysis_id/AN000696/mwtab/json";


/**
*   Setup 
*/



$MWB = new MWB\MWB;
$IO = new MWB\IO;
$API = new MWB\API;

$MWB->setAPI($API);
$MWB->setIO($IO);




/**
*   Variables
*/
$context      = 'study';

//$inputItem    = 'study_id';
$inputItem    = 'analysis_id';

$inputValue   = '1';    // Value to check (analysis_id, Study_id)
$outputItem   = 'mwtab';
$outputFormat = 'json';

/**
*   Test:  Analystic ID
*/

/*
$API->setContext($context);
$API->setInputItem($inputItem);
$API->setInputValue($inputValue);
$API->setOutputItem($outputItem);
$API->setOutputFormat($outputFormat);
*/

//print_r($API->_formatStudyNumber('102'));
//print_r($API->_formatArticleNumber('112'));




$MWB->setContext($context);
$MWB->setInputItem($inputItem);
$MWB->setInputValue($inputValue);
$MWB->setOutputItem($outputItem);
$MWB->setOutputFormat($outputFormat);

$results = $MWB->call();

?><?php
print_r($results);
?><?php


/**
*   Example:  Reading one article
*/

/*
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


/*
$MWB->setArticleIDs(array(1,2);
$MWB->setInputType('mtab');
$MWB->setOutputType('txt');

$results = $MWB->call();

?><?php
print_r($results);
?><?php
