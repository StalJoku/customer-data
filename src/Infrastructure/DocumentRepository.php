<?php

declare(strict_types=1);

namespace CustomerData\App\Infrastructure;

use CustomerData\App\Domain\DocumentDataFinderInterface;
use CustomerData\App\Models\DocumentReaderFinder;

class DocumentRepository implements DocumentDataFinderInterface
{
	public function __construct(private DocumentReaderFinder $documentFinder) { }

	/**
	 * @param string $file
     * @return array
     */
	public function get(string $file): array
	{
		$documentReaderType = $this->documentFinder->findDocumentType();

		if (!$documentReaderType) {
			return [];
		}

		$documentReader = new $documentReaderType();

		return $documentReader->readDocumentData($file);
	}
}