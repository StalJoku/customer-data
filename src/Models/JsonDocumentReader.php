<?php

declare(strict_types=1);

namespace CustomerData\App\Models;

class JsonDocumentReader implements DocumentReaderInterface
{
	/**
	 * @param string $fileName
     * @return array
     */
	public function readDocumentData(string $fileName): array
	{			
		$json = file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/Documents/' . "customers.json");
				 
		$jsonDataArray = json_decode($json, true);

		return $jsonDataArray ?? [];
	}
}