<?php

namespace CustomerData\App\Models;

interface DocumentTypeFinderInterface
{
	public function findDocumentType(): string;
}