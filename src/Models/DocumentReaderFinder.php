<?php

declare(strict_types=1);

namespace CustomerData\App\Models;

use CustomerData\App\Models\CsvDocumentReader;
use CustomerData\App\Models\XmlDocumentReader;
use CustomerData\App\Models\JsonDocumentReader;

class DocumentReaderFinder implements DocumentTypeFinderInterface
{
	public function __construct(private string $documentType) { }

	/**
     * @return string
     */
	public function findDocumentType(): string
	{	
		$readerClasses = [
			'csv' => CsvDocumentReader::class,
			'xml' => XmlDocumentReader::class,
			'json' => JsonDocumentReader::class,
		];		

		return $readerClasses[$this->documentType] ?? '';
	}
}