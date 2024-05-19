<?php
namespace App\Repositories;

use App\File;
use App\Repositories\BaseRepository;
use App\Repositories\FileRepositoryInterface;

class FileRepository extends BaseRepository implements FileRepositoryInterface
{
    public function getModel()
    {
        return File::class;
    }

}
