<?php

use Illuminate\Support\Facades\DB;

function convertdate()
{
        date_default_timezone_set('Asia/Jakarta');
        $date = date('dmy');
        return $date;
}
function autonumber($table,$primary,$prefix)
{
        $q=DB::table($table)->select(DB::raw('MAX(RIGHT('.$primary.',5)) as kd_max' ));
        $prx=$prefix;
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = $prx.sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = $prx."00001";
        }

        return $kd;
}

function autonumber_date($table,$primary,$prefix,$whereMonth,$whereYear)
{
        $q=DB::table($table)->select(DB::raw('MAX(RIGHT('.$primary.',5)) as kd_max'))
               ->whereYear($whereYear, '=', date('Y'))
               ->whereMonth($whereMonth, '=', date('m'));
        $prx=$prefix.convertdate();
        if($q->count()>0)
        {
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = $prx.sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = $prx."00001";
        }

        return $kd;
}