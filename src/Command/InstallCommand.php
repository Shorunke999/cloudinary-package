<?php

namespace Shorunke\Cloudinary\Command;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'cloudinary:install';
    protected $description = 'Publish Cloudinary config and service files';

    public function handle()
    {
        $this->info('Publishing Cloudinary configuration...');

        $this->call('vendor:publish', [
            '--tag' => 'cloudinary-config',
            '--force' => true,
        ]);

        $this->info('Publishing Cloudinary service class...');

        $this->call('vendor:publish', [
            '--tag' => 'cloudinary-service',
            '--force' => true,
        ]);

        $this->info('✅ Cloudinary has been installed successfully!');
    }
}
