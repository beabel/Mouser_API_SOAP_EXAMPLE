<?php
$wsdl       = 'http://api.mouser.com/service/searchapi.asmx?WSDL';//path to wsdl file 
$api_key    = 'xxx-xxx-xxx';//API Key
//######################################################
$searchstring = 'V102C121A';//this can be created dynamic
//######################################################//######################################################
class Mouser_SoapClient extends SoapClient{
    public function __construct(string $wsdl, array $options = []){
        $options = array_merge([
            'cache_wsdl' => WSLD_CACHE_NONE,
            'exceptions' => true,
            'soap_version' => SOAP_1_2,
            'trace' => true,
        ], $options);

        parent::__construct($wsdl, $options);
    }
}

$client = new Mouser_SoapClient($wsdl); 

// Header 
$headerbody = array('AccountInfo'=>array('PartnerID'=> $api_key ));
$header = new SoapHeader('http://api.mouser.com/service', 'MouserHeader', $headerbody);
$client->__setSoapHeaders($header);

// Execute the SOAP request             //BODY BODY BODY BODY BODY BODY BODY BODY 
$result = $client->SearchByPartNumber( array('mouserPartNumber' => $searchstring) );

echo '<pre>';
print_r($result);
echo '</pre>';
?>
