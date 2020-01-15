<?php

namespace App\Http\Controllers;

use Artisan;
use Storage;

class BackupController extends Controller
{

    public function index()
    {
        $disk = Storage::disk('backups');
        $files = $disk->files(config('laravel-backup.backup.name'));
        $backups = [];

        foreach ($files as $f) {
            $backups[] = [
                'file_name' => str_replace(config('laravel-backup.backup.name') . '/', '', $f),
                'file_size' => $disk->size($f),
            ];
        }

        return view('backup', compact('backups'));
    }

    /**
    * Create a backup.
    */
    public function create()
    {
        Artisan::call('backup:run');
        return redirect()->back();
    }

    /**
    * Deletes a backup file.
    */
    public function delete($file_name)
    {
        Storage::disk('backups')->delete($file_name);
        return redirect()->back();
    }
}