<?php
namespace MWB;

class IO{

  protected $outputType;
  protected $response;

  function __construct($response = NULL){
    $this->response = $response;

  }

  public function setResponse($response){
    $this->response = $response;
  }

  public function setOuputType($outputType){
    $this->outputType = $outputType;
  }


  protected function _isMwtab(){

  }

  protected function _isJson(){
    json_decode($this->response);
    return (json_last_error() == JSON_ERROR_NONE);
  }

  protected function _isTxt(){
    $fileInfo = new finfo(FILEINFO_MIME);
    $mimeType = $fileInfo->buffer($this->response);
    return ($mimeType == 'txt');
  }  

  public function _convertToMWBTab(){

  }

  public function _convertToJSON(){

  }

  public function _convertToTxt(){

  }

  public function render(){
    if($this->outputType == 'json'){
      if($this->_isJson($this->response)){
        return $this->response;
      }else{

      }
    }elseif($this->outpuType == 'txt'){

    }else{
      // MWTAB
    }
  }

}
