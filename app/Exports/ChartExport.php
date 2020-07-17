<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithCharts;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Layout;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;

class ChartExport implements WithTitle, WithCharts
{
    /**
     * @return Array
     */
    protected $user;

    public function __construct($user, $label, $categories, $values)
    {
        $this->label = $label;
        $this->categories = $categories;
        $this->values = $values;
        $this->user = $user;
        // dd($user);
    }

    public function charts()
    {
        return [$this->radaChart(), $this->collumChart()];
    }

    public function radaChart()
    {
        $label      = [new DataSeriesValues('String', $this->label, null, 1)];
        $categories = [new DataSeriesValues('String', $this->categories, null, 4)];
        $values     = [new DataSeriesValues('Number', $this->values, null, 4)];
        $series = new DataSeries(
            DataSeries::TYPE_RADARCHART,
            null,
            range(0, \count($values) - 1),
            $label,
            $categories,
            $values,
            null,
            null,
            DataSeries::STYLE_FILLED
        );

        $rada_chart  = new Chart(
            'ひょう',
            new Title($this->user['name']),
            new Legend(Legend::POSITION_RIGHT, null, false),
            new PlotArea(new Layout(), [$series]),
            true,
            DataSeries::EMPTY_AS_GAP,
            null,
            null
        );

        $rada_chart->setTopLeftPosition('A1');
        $rada_chart->setBottomRightPosition('I25');
        return $rada_chart;
    }

    public function collumChart()
    {
        $label      = [new DataSeriesValues('String', $this->label, null, 1)];
        $categories = [new DataSeriesValues('String', $this->categories, null, 5)];
        $values     = [new DataSeriesValues('Number', $this->values, null, 5)];
        $series = new DataSeries(
            DataSeries::TYPE_BARCHART,
            null,
            range(0, \count($values) - 1),
            $label,
            $categories,
            $values,
            null,
            null,
            DataSeries::STYLE_MARKER
        );

        $collum_chart  = new Chart(
            'ひょう',
            new Title($this->user['name']),
            new Legend(Legend::POSITION_RIGHT, null, false),
            new PlotArea(new Layout(), [$series]),
            true,
            DataSeries::EMPTY_AS_GAP,
            null,
            null
        );

        $collum_chart->setTopLeftPosition('K1');
        $collum_chart->setBottomRightPosition('S25');
        return $collum_chart;
    }

    public function title(): string
    {
        return 'Chart ' . $this->user['name'];
    }
}
