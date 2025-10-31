<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewsCommand extends Command
{
    protected $signature = 'make:views {name}';
    protected $description = 'Buat folder dan file views (index, create, edit, show) untuk model tertentu';

    public function handle()
    {
        $name = strtolower($this->argument('name'));
        $viewPath = resource_path("views/master/{$name}");

        if (!File::exists($viewPath)) {
            File::makeDirectory($viewPath, 0755, true);
        }

        $views = ['index', 'create', 'edit', 'show'];

        foreach ($views as $view) {
            $filePath = "{$viewPath}/{$view}.blade.php";

            if (!File::exists($filePath)) {
                File::put($filePath, $this->getTemplate($name, $view));
                $this->info("✅ View created: {$filePath}");
            } else {
                $this->warn("⚠️ File already exists: {$filePath}");
            }
        }

        $this->info("🎉 Semua view untuk '{$name}' berhasil dibuat!");
    }

    protected function getTemplate($name, $view)
    {
        $title = ucfirst($name);
        return <<<BLADE
@extends('layout.app')

@section('title', '{$title} - {$view}')

@section('content')
<div class="card">
  <div class="card-header">
    <h4>{$title} - {$view}</h4>
  </div>
  <div class="card-body">
    <p>Halaman {$view} untuk {$title}.</p>
  </div>
</div>
@endsection
BLADE;
    }
}
