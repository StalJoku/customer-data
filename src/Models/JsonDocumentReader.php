<?php

declare(strict_types=1);

namespace CustomerData\App\Models;

class JsonDocumentReader implements DocumentReaderInterface
{
	private const TYPE = 'json';

	/**
	 * @param string $fileName
     * @return array
     */
	public function readDocumentData(string $fileName): array
	{	
		if (empty($fileName) || self::TYPE != pathinfo($fileName, PATHINFO_EXTENSION)) {
			return [];
		}

		$json = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/Documents/' . $fileName);
				 
		$jsonDataArray = json_decode($json, true);

		return $jsonDataArray ?? [];
	}
}