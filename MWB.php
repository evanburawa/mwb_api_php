<?php
namespace MWB;


class MWB{
  
  function __construct(API $API = NULL, IO $IO = NULL){
    
    $this->IO = $IO;
    $this->API = $API;

  }
  
  
  /**
  *   Dependencies
  */

  public function setAPI(API $API){
    $this->API = $API;
  }

  public function setIO(IO $IO){
    $this->IO = $IO;
  }


  /**
  *   Set API params
  */

  public function setContext($context){
      $this->API->context = trim(strtolower($context));
  }

  public function setInputItem($inputItem){
      $this->API->inputItem = trim(strtolower($inputItem));
  }

  public function setInputValue($inputValue){
      $this->API->inputValue = trim(strtolower($inputValue));
  }  

  public function setOutputItem($outputItem){
      $this->API->outputItem = trim(strtolower($outputItem));
  }

  public function setOutputFormat($outputFormat){
      $this->API->outputFormat = trim(strtolower($outputFormat));
  }


  /**
  *   call and render API call
  */
  public function call(){
    
    $response = $this->API->call();
    
    // Default ot JSON if nothing else is specified
    $this->IO->setOutputType($this->API->outputType);
    
    $this->IO->setMwbtabInput($response);
    
    $output = $this->IO->render();
    
    return $output;
  }

}