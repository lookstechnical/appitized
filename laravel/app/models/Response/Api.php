<?php
namespace Response;

use Illuminate\Support\Facades\Response;

class Api extends Response
{

	public static function xml($data)
	{
		$xml = new \SimpleXMLElement("<?xml version=\"1.0\"?><plannets/>");
		
		self::_array_to_xml($data,$xml);
			    
	    $headers = array(
		    'Content-Type' => 'text/xml',
		);
	
		return Response::make($xml->asXML(), 200, $headers);

	}
	
	protected static function _array_to_xml($array, $xml){
		
		foreach($array as $key => $value) {
			
	        if(is_array($value)) {
	            if(!is_numeric($key)){
	                $subnode = $xml->addChild("$key");
	                self::_array_to_xml($value, $subnode);
	            } else {
	            	$subnode = $xml->addChild("item");
	                self::_array_to_xml($value, $subnode);
	            }
	        } else {
	            $xml->addChild("$key","$value");
	        }
        }

	}
	
	public static function csv($data)
	{
		return \CSV::fromArray($data)->render();
	}
	
	
}