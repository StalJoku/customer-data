<?php

namespace CustomerData\App\Models;

interface DocumentReaderInterface 
{
	public function readDocumentData(string $fileName): array;
}