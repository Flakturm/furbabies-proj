<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\ShelterAnimal;

class PullData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pull-data:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull data from the client uri json file and store it onto the database.';

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
        $client = new Client();

        $params = [
            'query' => [
                '$top'      => 9999,
                '$skip'     => 0,
                // '$filter'   => 'animal_id+like+10306131005002'
            ]
        ];
        $response = $client->request('GET', env('CLIENT_URI'), $params);
        $items = json_decode( $response->getBody(), true );

        $arr = [];

        foreach ( $items as $key => $item ) {

            if ( $item['animal_kind'] == '狗' )
            {
                $kind = 'dog';
            }
            else if ( $item['animal_kind'] == '貓' )
            {
                $kind = 'cat';
            }
            else
            {
                $kind = 'other';
            }

            $data = [
                'animal_id' => intval( $item['animal_id'] ),
                'subid' => $item['animal_subid'],
                'shelter_pkid' => $item['animal_shelter_pkid'],
                'place' => $item['animal_place'],
                'kind' => $kind,
                'sex' => strtolower($item['animal_sex']),
                'bodytype' => $item['animal_bodytype'] ? strtolower($item['animal_bodytype']) : 'other',
                'colour' => $item['animal_colour'],
                'age' => $item['animal_age'] ? strtolower($item['animal_age']) : 'other',
                'sterilisation' => strtolower($item['animal_sterilization']),
                'bacterin' => strtolower($item['animal_bacterin']),
                'foundplace' => $item['animal_foundplace'],
                'title' => $item['animal_title'],
                'status' => strtolower($item['animal_status']),
                'remark' => $item['animal_remark'],
                'caption' => $item['animal_caption'],
                'opendate' => $item['animal_opendate'],
                'closeddate' => $item['animal_closeddate'],
                'update' => $item['animal_update'],
                'createtime' => $item['animal_createtime'],
                'album_file' => $item['album_file'] ? $item['album_file'] : asset('images/nophoto.jpg')
            ];

            $arr[$key] = $data;
        }

        $this->info( count( $arr ) . ' records fetched and trimmed');

        $collection = collect( $arr );   //turn data into collection
        $chunks = $collection->chunk( 100 ); //chunk into smaller pieces

        foreach ( $chunks->toArray() as $key => $value )
        {
            $bar = $this->output->createProgressBar( count( $value ) );
            foreach ( $value as $data )
            {
                ShelterAnimal::updateOrCreate( ['animal_id' => $data['animal_id']], $data );
                $bar->advance();
            }
            $bar->finish();
            $this->info('');
            $this->info('Batch #' . $key . ' updated/created');
        }
        $this->info('');
        $this->info('All done.  ' . count( $arr ) . ' records updated or created.');
    }
}
