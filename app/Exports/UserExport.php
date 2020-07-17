<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class UserExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize, WithMultipleSheets
{
    public function __construct($user1, $user2, $user3)
    {
        $this->user1 = $user1;
        $this->user2 = $user2;
        $this->user3 = $user3;
        $this->users = collect([$user1, $user2, $user3]);
        // dd($this->users);
    }
    /**
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->users;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Language',
            'Awareness',
            'Diligence',
            'Logic',
            'Healthy',
            'Total'
        ];
    }

    public function map($user)
    {
        return [
            $user->name,
            $user->language,
            $user->awareness,
            $user->diligence,
            $user->logic,
            $user->healthy,
        ];
    }

    public function title(): string
    {
        return 'Sheet1';
    }

    public function sheets(): array
    {
        $sheets = [];
        $sheets[0] = new UserExport($this->user1, $this->user2, $this->user3);
        $sheets[1] = new ChartExport($this->user1, 'Sheet1!$A$2', 'Sheet1!$B$1:$F$1', 'Sheet1!$B$2:$F$2');
        $sheets[2] = new ChartExport($this->user2, 'Sheet1!$A$3', 'Sheet1!$B$1:$F$1', 'Sheet1!$B$3:$F$3');
        $sheets[3] = new ChartExport($this->user3, 'Sheet1!$A$4', 'Sheet1!$B$1:$F$1', 'Sheet1!$B$4:$F$4');
        return $sheets;
    }
}
