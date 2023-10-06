<?php

declare(strict_types=1);

namespace CustomerData\App\Controllers;

use CustomerData\App\Controller;
use CustomerData\App\Models\DocumentReader;
use CustomerData\App\Domain\DocumentManager;

use Exception;

class FileUploadController extends Controller 
{
    /**
     * @return void
     */
    public function index(): void 
    {
        $this->uploadFile();

        $this->render('index', ['data' =>  $this->getFileData()]);
    }

    /**
     * @return void
     */
    private function uploadFile(): void
    {
        $fileName = '';
        $tmpName = '';

        try {
            if (isset($_POST['submit'])) {
                $tmpName = $_FILES["upload_file"]["tmp_name"];
                $fileName = $_FILES['upload_file']['name'];
                $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

                $documentManager = new DocumentManager();
                $documentManager->uploadFile($tmpName, $fileName, $fileType);
            }           
        } catch (Exception $e) {
            print_r($e->getMessage());
        }
    }

    /**
     * @return array
     */
    private function getFileData(): array
    {  
        $fileName = '';
        $fileType = '';

        if (isset($_POST['submit'])) {
            $fileName = $_FILES['upload_file']['name'];
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);            
        }

        if (getenv('VALID_FILE_TYPE') == $fileType) {
            $documentManager = new DocumentManager();

            return $documentManager->getDocumentData(getenv('FILE_NAME'), getenv('VALID_FILE_TYPE'));
        }        

        return [];  
    }
}