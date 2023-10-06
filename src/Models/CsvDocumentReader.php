<?php

declare(strict_types=1);

namespace CustomerData\App\Models;

class CsvDocumentReader implements DocumentReaderInterface
{	
	private const TYPE = 'csv';

	/**
	 * @param string $fileName
     * @return array
     */
	public function readDocumentData(string $fileName): array
	{	
		if (empty($fileName) || self::TYPE != pathinfo($fileName, PATHINFO_EXTENSION)) {
			return [];
		}

		$csv = array_map('str_getcsv', file($_SERVER['DOCUMENT_ROOT'] . '/Documents/' . $fileName, FILE_SKIP_EMPTY_LINES));
		$keys = array_shift($csv);

		foreach ($csv as $i => $row) {
		    $csv[$i] = array_combine($keys, $row);
		}

		return $csv ?? [];
	}
}