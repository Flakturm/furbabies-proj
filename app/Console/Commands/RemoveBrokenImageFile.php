<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ShelterAnimal;

class RemoveBrokenImageFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove-broken-image:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find broken image links in shelter_animals DB and empty them.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $animals = ShelterAnimal::where( 'album_file', '!=' ,'' )
                                ->where( 'image_checked', '=', false )
                                ->where( 'status', '=', 'OPEN' )
                                ->get();

        $this->line( count( $animals ) . ' records will be checked for broken image link.' );

        $bar = $this->output->createProgressBar( count( $animals ) );

        $timeStart = microtime( true );

        foreach ( ShelterAnimal::where( 'album_file', '!=' ,'' )->where( 'image_checked', '=', false )->where( 'status', '=', 'OPEN' )->cursor() as $shelterAnimal )
        {
            if ( is_404( $shelterAnimal->album_file ) )
            {
                $loadStart = microtime( true );
                ShelterAnimal::find( $shelterAnimal->id )->update(['album_file' => '']);
                $this->comment( '  Broken link found.  ID = ' . $shelterAnimal->id . '.  Load time: ' . (microtime( true ) - $loadStart) . ' seconds.' );
            }

            ShelterAnimal::find( $shelterAnimal->id )->update(['image_checked' => true]);
            $bar->advance();
        }

        $bar->finish();

        $this->line( 'All records have been gone through.' );
        $this->info( 'Excution time: ' . (microtime( true ) - $timeStart)/60 . ' minutes' );
    }
}
