<?php

namespace App\Console\Commands;

use App\PhotoReviewItem;
use Illuminate\Console\Command;

class ImportReviews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:import_reviews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $photo_review_item;
    protected $description = 'Импорт отзывов из старой бд';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PhotoReviewItem $photo_review_item)
    {
        parent::__construct();
        $this->photo_review_item = $photo_review_item;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->photo_review_item->importReviews();
    }
}
