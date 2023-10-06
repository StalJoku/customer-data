<?php

declare(strict_types=1);

namespace CustomerData\App\Domain;

use Exception;

interface DocumentDataFinderInterface
{
	public function get(string $file): array;
}