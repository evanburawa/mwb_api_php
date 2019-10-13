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
        'outputItem',          
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
      
      if(!$this->_isInStudyNumberFormat()){  
        $this->_formatStudyNumber();
      }

    }elseif($this->inputItem == 'analysis_id'){
      
      if(!$this->_isInArticleFormat()){
        $this->_formatArticleNumber();
      }
    }
 }


  private function _countDigits($str){
      return preg_match_all( "/[0-9]/", $str );
  }


  public function _isInStudyNumberFormat(){
    
    if(strpos($this->inputValue, 'ST') !== false && $this->countDigit() == 6){
      return true;
    }
    return false;
  }


  public function _isInArticleFormat(){
    if(strpos($this->inputValue, 'AN') !== false && $this->countDigit() == 6){
      return true;
    }
    return false;
  }


   public function _formatArticleNumber(){
      $this->inputValue = $this->_removeNonNumericChars($this->inputValue);
      $this->inputValue = "AN".sprintf('%06d', $this->inputValue);
   }


   public function _formatStudyNumber(){
      $this->inputValue = $this->_removeNonNumericChars($this->inputValue);
      $this->inputValue = "ST".sprintf('%06d', $this->inputValue);
   }


   private function _removeNonNumericChars($str){
      return preg_replace("/[^0-9]/", "", $str );
   }

  private function _generateAPIURI(){
    
    $this->_formatInputData();

    $API_URL = self::API_URL;
    $API_URL = str_replace('{context}',''.$this->context.'',$API_URL);
    $API_URL = str_replace('{inputItem}',''.$this->inputItem.'',$API_URL);
    $API_URL = str_replace('{inputValue}',''.$this->inputValue.'',$API_URL);
    $API_URL = str_replace('{outputItem}',''.$this->outputItem.'',$API_URL);
    $API_URL = str_replace('{outputFormat}',''.$this->outputFormat.'',$API_URL);
    return $API_URL;
  }


  private function _APIParamCheck(){
    foreach($this->required as $prop){
      if(!isset($this->$prop) || $this->$prop == ''){
        return false;
      }
    }
    return true;
  }


  private function _fetchFile($apiURI){

      $curl = curl_init();
      curl_setopt_array($curl, [
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => ''.$apiURI.'',
      ]);
      $response = curl_exec($curl);
      
      $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      $curl_error= curl_errno($curl);
      
      curl_close($curl);

      return $response;
  }

  
  public function call(){

echo "precheck <br/>";
    if($this->_APIParamCheck()){
echo "checked<br/>";
      $apiURL = $this->_generateAPIURI();
echo "url: ".$apiURL."<br/>";
      $contents = $this->_fetchFile($apiURL);
      
      return $contents; 
    }

    return NULL;
  }
}
