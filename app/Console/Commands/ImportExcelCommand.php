<?php

namespace App\Console\Commands;

use App\Imports\MainImport;
use Illuminate\Console\Command;
use App\Imports\SettlementsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MainSettlementImport;
use Illuminate\Support\Facades\Storage;

class ImportExcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start a queue process to import excel';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = Storage::path('CPdescarga.xls');
        $this->output->title('*************** Starting import *****************+');
        Excel::import(new MainImport, $path);
        $this->output->success('Import successful');
    }
}
