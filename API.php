<?php
namespace MWB;

class API extends MWB{

  const API_URL = 'https://www.metabolomicsworkbench.org/rest/{context}/{inputItem}/{inputValue}/{outputItem}/{outputFormat}';  

  protected $context;
  protected $inputItem;
  protected $inputValue;
  protected $ouputItem;
  protected $outputFormat;


  function __construct($context='', $inputItem='', $inputValue='', $ouputItem='', $outputFormat=''){
    

    /**
    *   required fields
    */
    $this->required = array(
        'context',
        'inputItem',       
        'inputValue', 
        'ouputItem',          
        'outputFormat'
    );
  
  }

  public function setContext($context){
      $this->context = $context;
  }

  public function setInputItem($inputItem){
      $this->inputItem = $inputItem;
  }

  public function setInputValue($inputValue){
      $this->inputValue = $inputValue;
  }  

  public function setOutputItem($outputItem){
      $this->outputItem = $outputItem;
  }

  public function setOutputFormat($outputFormat){
      $this->outputFormat = $outputFormat;
  }


 private function _formatInputData(){
    // Format Article number (if applicable)
    if($this->inputItem == 'study_id'){
      $this->_formatStudyNumber();
    }elseif($this->inputItem == 'analysis_id'){
      $this->_formatArticleNumber();
    }
 }

 public function _formatArticleNUmber($number){
    return "AN".sprintf('%06d', $number);
 }

 public function _formatStudyNumber($number){
    return "ST".sprintf('%06d', $number);
 }

  private function _generateAPIURI(){
    
    $this->_formatInputData();

    $API_URL = self::API_URL;
    $API_URL = str_replace('{articleID}',''.$this->articleID.'',$API_URL);
    $API_URL = str_replace('{inputType}',''.$this->inputType.'',$API_URL);
    $API_URL = str_replace('{outputType}',''.$this->outputType.'',$API_URL);
    $API_URL = str_replace('{outputType}',''.$this->outputType.'',$API_URL);
    $API_URL = str_replace('{outputType}',''.$this->outputType.'',$API_URL);
    return $API_URL;
  }

/*
  private function _APIParamCheck(){
    if($this->articleID != '' && $this->inputType != '' && $this->outputType != ''){
      return true;
    }
    return false;

  }
*/

/*  
  private function _articleExists(){

  }
*/


  private function _fetchFile($apiURL){
      $response = file_get_contents($apiURL);
  }

  private function _readFile(){

  }
  
  public function call(){
    if($this->_APIParamCheck()){

      $apiURL = $this->_generateAPIURI();

      $contents = $this->_fetchFile($apiURL);
      
      return $contents; 
    }

    return false;
  }
}
