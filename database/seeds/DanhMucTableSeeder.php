<?php

use Illuminate\Database\Seeder;
//use DateTime;
class DanhMucTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('danhmuc')->insert(
					[
						[
							'name' => 'Giải trí',
							'created_at' => new \DateTime(),
						],
						[
							'name' => 'Xã hội',
							'created_at' => new \DateTime(),
						],
					]
				);
    }
}
