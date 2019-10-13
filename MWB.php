<?php
namespace MWB;


class MWB{
  
  function __construct($article_id=NULL){
    
    $this->article_id = $article_id;

    $this->IO = NULL;
    $this->API = NULL;

  }

  public function setAPI(API $API){
    $this->API = $API;
  }

  public function setIO(IO $IO){
    $this->IO = $IO;
  }

  public function setArticleID(int $article_id){
    $this->article_id = $article_id;
    $this->_setChildrenArticleIDs($article_id);
  }


  /**
  *   Set API params
  */
  public function setInputType($type){
    $this->API->setInputType($type);
  }

  public function setOutputType($type){
    $this->API->setOuputType($type);
  }  

  private function _setArticleID($article_id){
    $this->API->setArticleID($article_id);    
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