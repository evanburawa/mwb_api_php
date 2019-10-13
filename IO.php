<?php
namespace MWB;

class IO extends MWB{

  function __construct($response = NULL){
    $this->response = $response;

  }

  public function setResponse($response){
    $this->response = $response;
  }

  protected _isMwtab(){

  }

  protected _isJson(){

  }

  public function render(){

  }
}
