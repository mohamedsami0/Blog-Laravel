<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([

        'tag'          =>      'PHP',
        'created_at'    =>      Carbon::now()->format('Y-m-d H:i:s'),
        'updated_at'    =>      Carbon::now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('tags')->insert([

            'tag'          =>      'Python',
            'created_at'    =>      Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    =>      Carbon::now()->format('Y-m-d H:i:s'),
            
            ]);

            DB::table('tags')->insert([

                'tag'          =>      'Java',
                'created_at'    =>      Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    =>      Carbon::now()->format('Y-m-d H:i:s'),
                
                ]);
                
                DB::table('tags')->insert([

                    'tag'          =>      'Egypt',
                    'created_at'    =>      Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at'    =>      Carbon::now()->format('Y-m-d H:i:s'),
                    
                    ]);

                    DB::table('tags')->insert([

                        'tag'          =>      'Linux',
                        'created_at'    =>      Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_at'    =>      Carbon::now()->format('Y-m-d H:i:s'),
                        
                        ]);
    }
}
