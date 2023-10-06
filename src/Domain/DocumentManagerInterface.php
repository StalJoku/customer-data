<?php

namespace CustomerData\App\Domain;

interface DocumentManagerInterface 
{
	public function uploadFile(string $tmpName, string $fileName, string $fileType): bool;

	public function getDocumentData(string $file, string $fileType): array;
}