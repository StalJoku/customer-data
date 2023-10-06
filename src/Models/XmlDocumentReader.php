<?php

declare(strict_types=1);

namespace CustomerData\App\Models;

class XmlDocumentReader implements DocumentReaderInterface
{
	/**
	 * @param string $fileName
     * @return array
     */
	public function readDocumentData(string $fileName): array
	{	
		if (empty($fileName)) {
			return [];
		}
		
		$xml = simplexml_load_file($_SERVER["DOCUMENT_ROOT"] . '/Documents/' . $fileName);

		$xmlToJson = json_encode($xml); 		 
		$xmlDataArray = json_decode($xmlToJson, true);

		return $xmlDataArray['item'];
	}
}