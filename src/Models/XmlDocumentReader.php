<?php

declare(strict_types=1);

namespace CustomerData\App\Models;

class XmlDocumentReader implements DocumentReaderInterface
{
	private const TYPE = 'xml';

	/**
	 * @param string $fileName
     * @return array
     */
	public function readDocumentData(string $fileName): array
	{	
		if (empty($fileName) || self::TYPE != pathinfo($fileName, PATHINFO_EXTENSION)) {
			return [];
		}
		
		$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/Documents/' . $fileName);

		$xmlToJson = json_encode($xml); 		 
		$xmlDataArray = json_decode($xmlToJson, true);

		return $xmlDataArray['item'];
	}
}