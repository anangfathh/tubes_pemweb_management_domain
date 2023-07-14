<?php

namespace App\Charts;

use App\Models\Domain;
use Illuminate\Support\Facades\Auth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ActiveDomainChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        if (Auth::user()->is_admin == 0) {
            $activeDomain = Domain::where('http_status', 'aktif')->where('user_id', Auth::user()->id)->count();

            $inactiveDomain = Domain::where('http_status', '!=', 'aktif')->where('user_id', Auth::user()->id)->count();
        } else {
            $activeDomain = Domain::where('http_status', 'aktif')->count();
            $inactiveDomain = Domain::where('http_status', '!=', 'aktif')->count();
        }
        return $this->chart->pieChart()
            ->addData([$activeDomain, $inactiveDomain])
            ->setLabels(['Domain Aktif', 'Domain Inactive']);
    }
}
