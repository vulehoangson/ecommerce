<?php
namespace Vulehoangson\Ecommerce\Console\Commands;

use Illuminate\Console\Command;

class MakeInvoiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ecommerce:make-invoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a invoice';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('This is command for Invoice');
    }
}
