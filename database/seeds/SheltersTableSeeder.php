<?php

use Illuminate\Database\Seeder;
use App\Shelter;
use Carbon\Carbon;

class SheltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shelters')->delete();
        Shelter::insert([
            ['id' => 48, 'name' => '基隆市寵物銀行', 'area_id' => 4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 49, 'name' => '臺北市動物之家', 'area_id' => 2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 50, 'name' => '新北市板橋區公立動物之家', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 51, 'name' => '新北市新店區動物之家', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 52, 'name' => '新北市新莊區動物之家', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 53, 'name' => '新北市中和區動物之家', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 58, 'name' => '新北市五股區動物之家', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 59, 'name' => '新北市八里區動物之家', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 60, 'name' => '新北市三芝區動物之家', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 61, 'name' => '桃園市動物保護教育園區', 'area_id' => 6, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 62, 'name' => '新竹市動物收容所', 'area_id' => 8, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 63, 'name' => '新竹縣動物收容所', 'area_id' => 7, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 67, 'name' => '臺中市動物之家南屯園區', 'area_id' => 10, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 69, 'name' => '彰化縣流浪狗中途之家', 'area_id' => 11, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 70, 'name' => '南投縣公立動物收容所', 'area_id' => 12, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 71, 'name' => '嘉義市流浪動物收容所', 'area_id' => 15, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 72, 'name' => '嘉義縣流浪犬中途之家', 'area_id' => 14, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 73, 'name' => '臺南市動物之家灣裡站', 'area_id' => 16, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 74, 'name' => '臺南市動物之家善化站', 'area_id' => 16, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 75, 'name' => '高雄市壽山站動物保護教育園區', 'area_id' => 17, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 76, 'name' => '高雄市燕巢動物保護關愛園區', 'area_id' => 17, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 77, 'name' => '屏東縣流浪動物收容所', 'area_id' => 18, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 78, 'name' => '宜蘭縣流浪動物中途之家', 'area_id' => 5, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 79, 'name' => '花蓮縣流浪犬中途之家', 'area_id' => 19, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 80, 'name' => '臺東縣動物收容中心', 'area_id' => 20, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 81, 'name' => '連江縣流浪犬收容中心', 'area_id' => 23, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 82, 'name' => '金門縣動物收容中心', 'area_id' => 22, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 83, 'name' => '澎湖縣流浪動物收容中心', 'area_id' => 21, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 89, 'name' => '雲林縣流浪動物收容所', 'area_id' => 13, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 90, 'name' => '臺中市愛心小站', 'area_id' => 10, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 91, 'name' => '臺中市中途動物醫院', 'area_id' => 10, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 92, 'name' => '新北市政府動物保護防疫處', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 96, 'name' => '苗栗縣動物保護防疫所', 'area_id' => 9, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
