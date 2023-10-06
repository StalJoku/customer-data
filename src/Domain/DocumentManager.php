<?php

declare(strict_types=1);

namespace CustomerData\App\Domain;

use CustomerData\App\Models\DocumentReaderFinder;
use CustomerData\App\Infrastructure\DocumentRepository;

use Exception;

class DocumentManager implements DocumentManagerInterface
{
	/**
	 * @param string $tmpName
	 * @param string $fileName
	 * @param string $fileType
     * @return bool
     */
	public function uploadFile(string $tmpName, string $fileName, string $fileType): bool
	{		
		$targetDirectory = $_SERVER["DOCUMENT_ROOT"] . '/Documents/';
		$targetFile = $targetDirectory . basename($fileName);
		$successMessage = "Upload Complete!";
		$errorMessage = "file does not exist!";

		if (empty($tmpName)) {
			echo $errorMessage;

			return false;
		}

		if ($fileType != getenv('VALID_FILE_TYPE')) {
			echo sprintf("Only %s format is allowed", getenv('VALID_FILE_TYPE'));

			return false;
		}

		if (file_exists($targetFile)) {
  			$successMessage .= " File has been replaced because it already exists";

  			unlink($targetFile);
		}

		try {			
		    if (!move_uploaded_file($tmpName, $targetFile)) {
		        throw new Exception('Could not move file');
		    }

		    echo $successMessage;

		    return true;
		} catch (Exception $e) {
	    	die ('File did not upload: ' . $e->getMessage());
		}
	}

	/**
	 * @param string $file
	 * @param string $fileType
     * @return array
     */
	public function getDocumentData(string $file, string $fileType): array
	{
		$documentReader = new DocumentReaderFinder($fileType);
		$documentRepository = new DocumentRepository($documentReader);

		return $documentRepository->get($file);
	}
}