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
            ['id' => 48, 'name' => '基隆市寵物銀行', 'address' => '基隆市七堵區瑪西里大華三路45-12號', 'telephone' => '02-24560148', 'email' => '', 'remark' => '開放參訪時段: 週二~週六上午9:00~12:00, 下午13:00~16:30<br>
開放認養時段: 週二~週五下午14:00~16:30, 週六: 上午9:00~12:00<br><br>
中午休息時段: 中午12:00~下午13:00<br>
(國定例假日休息)', 'area_id' => 4, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 49, 'name' => '臺北市動物之家', 'address' => '臺北市內湖區潭美街852號', 'telephone' => '02-87913254', 'email' => '', 'remark' => '開放參訪日期: 週二~週日<br>
開放參訪時段: 上午10:00~12:30, 下午1:30~4:00', 'area_id' => 2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 50, 'name' => '新北市板橋區公立動物之家', 'address' => '新北市板橋區華東路1-9號', 'telephone' => '02-89662158', 'email' => '', 'remark' => '開放參訪日期:  週二~週日
開放參訪時段: 上午10:00-12:00, 下午14:00-16:00', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 51, 'name' => '新北市新店區動物之家', 'address' => '新北市新店區安泰路235號', 'telephone' => '02-22159462', 'email' => '', 'remark' => '開放參訪日期: 週一~週五<br>
開放參訪時段: 上午10:00-12:00, 下午14:00-16:00', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 52, 'name' => '新北市新莊區動物之家', 'address' => '新北市泰山區楓江路191號', 'telephone' => '02-22977814', 'email' => '', 'remark' => '開放參訪日期: 週一~週五<br>
開放參訪時段: 上午10:00-12:00, 下午14:00-16:00', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 53, 'name' => '新北市中和區動物之家', 'address' => '新北市中和區興南路三段100號', 'telephone' => '02-86685547', 'email' => '', 'remark' => '開放參訪日期: 週二~週日<br>
開放參訪時段: 上午10:00-12:00, 下午14:00-16:00', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 58, 'name' => '新北市五股區動物之家', 'address' => '新北市五股區外寮路9-9號', 'telephone' => '02-82925265', 'email' => '', 'remark' => '開放參訪日期: 週二~週日<br>
開放參訪時段: 上午10:00-12:00, 下午14:00-16:00', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 59, 'name' => '新北市八里區動物之家', 'address' => '新北市八里區長坑村6鄰長道路36號', 'telephone' => '02-26194428', 'email' => '', 'remark' => '開放參訪日期: 週一~週五<br>
開放參訪時段: 上午10:00-12:00, 下午14:00-16:00', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 60, 'name' => '新北市三芝區動物之家', 'address' => '新北市三芝區中山路一段32號', 'telephone' => '02-26365436', 'email' => '', 'remark' => '新北市三芝區圓山里青山路龍嚴建設旁<br>
開放參訪日期: 週一~週五<br>
開放參訪時段: 上午10:00-12:00, 下午14:00-16:00<br><br>
距離貝殼廟約5分鐘車程<br>
距離三芝市區約15分鐘車程', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 61, 'name' => '桃園市動物保護教育園區', 'address' => '桃園市新屋區永興里大牛欄117號', 'telephone' => '03-4861760', 'email' => '', 'remark' => '開放參訪日期: 週二、四、六，另國定假日休園。<br>
開放參訪時段: 上午10:00~12:00, 下午1:30~3:30<br><br>
領養注意事項:<br>
1. 需攜帶年滿20歲的身分證件<br>
2. 植入晶片,進行寵物登記<br>
3. 收取規費(領養1隻動物最多收取510元)<br>
4. 幼年動物可直接辦理認領養,成年動物需待絕育後通知帶回<br><br>
如何前往園區:<br>
1. 由台66線東西向快速道路，在台15線濱海公路往南，到了51.7公里處，看到金發便利商店就右轉，遇到堤防再左轉，約1公里就可到達 。<br>
2. 由台66線東西向快速道路走到底，左轉台61線西濱公路往南，到了51.4公里處右轉，遇到堤防再左轉，約1公里就可到達 。<br>
3. 由縣道144號往永安漁港方向，右轉台61線濱公路往北，到了51.4公里處左轉，遇到堤防再左轉，約1公里就可到達 。', 'area_id' => 6, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 62, 'name' => '新竹市動物收容所', 'address' => '新竹市南寮里海濱路250號', 'telephone' => '03-5368329', 'email' => '', 'remark' => '開放參訪日期:<br>
週一~週五<br>
開放參訪時段: 上午09:30~中午11:30, 下午2:00~下午4:00<br><br>
週六<br>
開放參訪時段: 上午10:00~12:00<br><br>
週日及國定假日不開放', 'area_id' => 8, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 63, 'name' => '新竹縣動物收容所', 'address' => '新竹縣竹北市縣政五街192號', 'telephone' => '03-5519548#202', 'email' => '', 'remark' => '開放時間：<br>
週二至週五 8:00~16:00<br>
週六(不含連假及節日)10:00~15:00', 'area_id' => 7, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 67, 'name' => '臺中市動物之家南屯園區', 'address' => '臺中市南屯區中台路601號', 'telephone' => '04-23850976', 'email' => '', 'remark' => '開放參訪日期: 週一、二、四、六<br>
開放認養日期: 週一~週六<br><br>
開放認養時段:上午10:00~12:00, 下午1:30~4:00', 'area_id' => 10, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 69, 'name' => '彰化縣流浪狗中途之家', 'address' => '彰化縣員林鎮大峰里阿寶坑426號', 'telephone' => '04-8590638', 'email' => '', 'remark' => '開放參訪日期: 週一~週日(週五不開放)<br>
開放認養時間: 週一、三、六、日<br>
開放參訪時段: 上午10:00~12:00, 下午2:00~4:00<br>
入口請衛星定位搜尋: 彰化縣芬園鄉大彰路一段875巷直走到底', 'area_id' => 11, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 70, 'name' => '南投縣公立動物收容所', 'address' => '南投縣南投市嶺興路36之1號', 'telephone' => '049-2225440', 'email' => '', 'remark' => '開放參訪日期: 週一~週五，另例假日需事先聯絡再安排人員辦理。<br>
開放參訪時段: 上午9:00~11:30, 下午1:30~4:00', 'area_id' => 12, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 71, 'name' => '嘉義市流浪動物收容所', 'address' => '嘉義市彌陀路101號', 'telephone' => '05-2168661', 'email' => '', 'remark' => '開放參訪日期: 週一~週日，農曆過年期間(含前一週)進行全場消毒防疫工作，暫停開放。<br><br>
開放參訪時段: 上午9:00~11:30, 下午2:00~4:30', 'area_id' => 15, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 72, 'name' => '嘉義縣流浪犬中途之家', 'address' => '嘉義縣民雄鄉松山村後山仔37~1號', 'telephone' => '05-2724721', 'email' => '', 'remark' => '開放參訪日期: 週一~週六<br>
開放參訪時段: 周一至周五上午9:00~12:00, 下午1:00~4:00<br>週六上午9:00~12:00', 'area_id' => 14, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 73, 'name' => '臺南市動物之家灣裡站', 'address' => '臺南市南區省躬里14鄰萬年路580巷92號', 'telephone' => '06-2964439', 'email' => '', 'remark' => '開放參訪日期: 週二~週六，另星期一、日及國定例假日不開放。<br>
開放參訪時段: 上午9:00~12:00, 下午1:30~4:30', 'area_id' => 16, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 74, 'name' => '臺南市動物之家善化站', 'address' => '臺南市善化區東昌里東勢寮1之19號', 'telephone' => '06-5832399', 'email' => '', 'remark' => '開放參訪日期: 週二~週六，另星期一、日及國定例假日不開放。<br>
開放參訪時段: 上午9:00~12:00, 下午1:30~4:30', 'area_id' => 16, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 75, 'name' => '高雄市壽山站動物保護教育園區', 'address' => '高雄市鼓山區萬壽路350號', 'telephone' => '07-5519059', 'email' => '', 'remark' => '開放參訪日期： 週二~週日，週一及國定假日休園。<br>
開放參訪時段：上午09：30-12：00；下午13：30-17：00 ', 'area_id' => 17, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 76, 'name' => '高雄市燕巢動物保護關愛園區', 'address' => '高雄市燕巢區師大路98號', 'telephone' => '07-6051002', 'email' => '', 'remark' => '開放參訪日期： 週二~週六，週一、週日及國定假日休園。<br>
開放參訪時段： 上午09：30-12：00, 下午13：30-17：00', 'area_id' => 17, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 77, 'name' => '屏東縣流浪動物收容所', 'address' => '屏東縣內埔鄉學府路1號', 'telephone' => '08-7701094', 'email' => '', 'remark' => '認養時段: 週一至週五早上9:00~11:00, 下午2:00~6:00<br><br>屏東科技大學內', 'area_id' => 18, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 78, 'name' => '宜蘭縣流浪動物中途之家', 'address' => '宜蘭縣五結鄉成興村利寶路60號', 'telephone' => '039-602350', 'email' => '', 'remark' => '開放參訪日期(夏令): 週一~週五<br>
開放參訪時段(夏令): 上午8:00~下午5:30<br><br>
開放參訪日期(冬令): 每年11月1日至隔年2月底，週一~週五<br>
開放參訪時段(冬令): 上午8:00~下午5:00<br><br>
一、由國道5號羅東交流道下→直行到底後左轉（往親水公園）→過利澤簡大橋直走到
底後右轉→過噶瑪蘭大飯店，第一個紅綠燈左轉→宜蘭縣動植物防疫所。<br>
二、走北部濱海公路→到頭城鎮，不要開上頭城大橋，直接左轉→走台2線 →經壯圍鄉、
五結鄉→過噶瑪蘭大飯店，第一個紅綠燈左轉→宜蘭縣動 植物防疫所。<br>
三、走北宜公路→到礁溪鄉右轉→走台9線→過宜蘭大橋，進入宜蘭市→往羅東方向→
經宜蘭運動公園與宜蘭縣政府→當過蘭陽大橋後，第二個紅綠燈左轉→走學進路
到底後左轉（往親水公園）→過利澤簡大橋直走到底後右轉→過噶瑪蘭大飯店，
第一個紅綠燈左轉→宜蘭縣動植物防疫所。', 'area_id' => 5, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 79, 'name' => '花蓮縣流浪犬中途之家', 'address' => '花蓮縣吉安鄉南濱路1段599號', 'telephone' => '038-421452', 'email' => '', 'remark' => '開放參訪日期: 週一~週五<br>
開放參訪時段: 上午10:00~12:00, 下午2:00~4:00<br>
開放參訪日期: 週六
開放參訪時段: 上午10:00~下午4:00<br>
遇國定連續假日停止開放乙次', 'area_id' => 19, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 80, 'name' => '臺東縣動物收容中心', 'address' => '臺東縣臺東市中華路4段900巷600號', 'telephone' => '089-362011', 'email' => 'guo6671@gmail.com', 'remark' => '開放參訪及領養日期: 週一~週日<br>
開放參訪及領養時段: 上午9:30~11:30, 下午2:30~4:30 ', 'area_id' => 20, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 81, 'name' => '連江縣流浪犬收容中心', 'address' => '馬祖南竿鄉復興村', 'telephone' => '0836-25003', 'email' => '', 'remark' => '開放參訪日期: 週一~週五<br>
開放參訪時段: 上午8:00~12:00, 下午1:30~5:30', 'area_id' => 23, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 82, 'name' => '金門縣動物收容中心', 'address' => '金門縣金湖鎮裕民農莊20號', 'telephone' => '082-336625', 'email' => '', 'remark' => '開放參訪日期: 週一~週五<br>
開放參訪時段: 上午8:00~12:00, 下午1:30~5:30', 'area_id' => 22, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 83, 'name' => '澎湖縣流浪動物收容中心', 'address' => '澎湖縣馬公市烏崁里260號', 'telephone' => '06-9213559', 'email' => '', 'remark' => '開放參訪日期: 週一~週五<br>
開放參訪時段: 上午9:00~11:30, 下午2:00~4:30', 'area_id' => 21, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 89, 'name' => '雲林縣流浪動物收容所', 'address' => '雲林縣斗六市雲林路二段517號', 'telephone' => '', 'email' => '', 'remark' => '若要前往參訪或認領養寵物，可聯絡各動物醫院/代養場', 'area_id' => 13, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 90, 'name' => '臺中市愛心小站', 'address' => '', 'telephone' => '', 'email' => '', 'remark' => '', 'area_id' => 10, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 91, 'name' => '臺中市中途動物醫院', 'address' => '', 'telephone' => '', 'email' => '', 'remark' => '', 'area_id' => 10, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 92, 'name' => '新北市政府動物保護防疫處', 'address' => '新北市板橋區四川路1段157巷2號', 'telephone' => 'tpc58801@ms1.gsn.gov.tw', 'email' => '02-29596353', 'remark' => '', 'area_id' => 3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 96, 'name' => '苗栗縣動物保護防疫所', 'address' => '苗栗縣銅鑼鄉朝陽村6鄰朝北55-1號', 'telephone' => '037-558228', 'email' => '', 'remark' => '開放時間：<br>
週二至週四 上午9:00~12:00, 下午13:00~16:00 (中午休息時間不開放)<br>
週五、週六 上午9:00-12:00<br><br>
星期五及星期六下午無對外開放，星期日、星期一及國定假日(連續假日)整天無對外開放。<br>
其他天然災害來襲時將彈性調整開放情形，請自行至本所網站公告處確認。', 'area_id' => 9, 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
