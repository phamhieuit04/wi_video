<?php

namespace App\Services\Google;

use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\DriveFile;
use Illuminate\Support\Facades\Log;

class GoogleDriveService
{
    const FOLDER_ID = '11P2dDpoqlZKIeZZ3GEb87ZA7aAnzPrhT';
    private $client;
    private $driveService;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuthConfig(storage_path('google_credenticals.json'));
        $this->client->addScope(Drive::DRIVE);
        $this->driveService = new Drive($this->client);
    }

    public  function synchronize(string $filePath, string $fileName, $folderId = null)
    {
        $fileMetadata = new DriveFile([
            'name' => $fileName,
            'parents' => [is_null($folderId) ? self::FOLDER_ID : $folderId]
        ]);
        $content = file_get_contents($filePath);
        try {
            $file = $this->driveService->files->create($fileMetadata, [
                'data' => $content,
                'mimeType' => mime_content_type($filePath),
                'uploadType' => 'multipart',
                'fields' => 'id'
            ]);
            return $file->id;
        } catch (\Exception $e) {
            Log::error($e);
            throw new \Exception($e);
        }
    }
}
