<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class FileStorageCustomConfigProvider extends ServiceProvider
{

    public function register()
    {
        try {
            $setting = DB::table('file_storage_settings')->where('status', 'enabled')->first();

            switch ($setting->filesystem) {

            case 'aws_s3':
                $authKeys = json_decode($setting->auth_keys);
                $driver = $authKeys->driver;
                $key = $authKeys->key;
                $secret = $authKeys->secret;
                $region = $authKeys->region;
                $bucket = $authKeys->bucket;
                config(['filesystems.default' => $driver]);
                config(['filesystems.cloud' => $driver]);
                config(['filesystems.disks.s3.key' => $key]);
                config(['filesystems.disks.s3.secret' => $secret]);
                config(['filesystems.disks.s3.region' => $region]);
                config(['filesystems.disks.s3.bucket' => $bucket]);
                break;


            case 'digitalocean':
                $authKeys = json_decode($setting->auth_keys);
                $driver = $authKeys->driver;
                $key = $authKeys->key;
                $secret = $authKeys->secret;
                $region = $authKeys->region;
                $bucket = $authKeys->bucket;
                config(['filesystems.default' => 'digitalocean']);
                config(['filesystems.cloud' => 'digitalocean']);
                config(['filesystems.disks.digitalocean.key' => $key]);
                config(['filesystems.disks.digitalocean.secret' => $secret]);
                config(['filesystems.disks.digitalocean.region' => $region]);
                config(['filesystems.disks.digitalocean.bucket' => $bucket]);
                config(['filesystems.disks.digitalocean.endpoint' => 'https://' . $region . '.digitaloceanspaces.com']);
                break;

                // For local storage
            default :
                config(['filesystems.default' => $setting->filesystem]);
                break;

            }
        } catch (\Exception $e) {} // phpcs:ignore

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

}
