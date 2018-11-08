<?php

namespace App\Console\Commands;

use App\Models\EduSubscribe;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HoudunrenSubscribe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'houdunren_subscribe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '延长会员时间';

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
        //今天前的加一个月
//        EduSubscribe::latest('end_time')
//            ->where('end_time', '>', new Carbon('2018-10-6'))
//            ->get()->each(function ($subscribe) {
//                $subscribe['end_time'] = (new Carbon($subscribe['end_time']))->addMonth(2);
//                $subscribe->save();
//            });

        //10.6~11.7日的加1个月
//        EduSubscribe::latest('end_time')
//            ->where('end_time', '>', new Carbon('2018-10-6'))
//            ->where('end_time', '<', new Carbon('2018-11-6'))
//            ->get()->each(function ($subscribe) {
//                $subscribe['end_time'] = new Carbon('2018-12-06');
//                $subscribe->save();
//            });
    }
}