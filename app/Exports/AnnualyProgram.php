<?php

namespace App\Exports;

use App\Models\Distribution;
use Illuminate\Contracts\View\View;
use IntlDateFormatter;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AnnualyProgram implements FromView, ShouldAutoSize, WithStyles, WithColumnWidths, WithTitle
{
    protected $id;
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function sumAmount($program, $month)
    {
        $year = $this->id;
        $distributions = Distribution::getAnnualy($year);

        $data = $distributions->where([
            ['created_at', 'LIKE', $year . '-' . $month . '%'],
            ['program_id', $program]
        ])->get();

        $amounts = 0;
        for ($i = 0; $i <= count($data) - 1; $i++) {
            $data[$i]->amount;
            $amounts += $data[$i]->amount;
        }
        return $amounts;
    }

    public function getAmount($month)
    {
        $program = [
            '1',
            '2',
            '3',
            '4',
            '5',
        ];
        $month = [
            $program[0] => $this->sumAmount($program[0], $month),
            $program[1] => $this->sumAmount($program[1], $month),
            $program[2] => $this->sumAmount($program[2], $month),
            $program[3] => $this->sumAmount($program[3], $month),
            $program[4] => $this->sumAmount($program[4], $month),
        ];

        return $month;
    }

    public function view(): View
    {
        $fmt = new IntlDateFormatter(
            'id_ID',
            IntlDateFormatter::LONG,
            IntlDateFormatter::NONE,
            'Asia/Jakarta',
            IntlDateFormatter::GREGORIAN
        );
        $year = $this->id;
        $report = [];

        for ($i = 1; $i <= 12; $i++) {
            if ($i <= 9) {
                $amount = $this->getAmount('0' . $i);
                $date = date_create('0001-0' . $i . '-01');
            } else {
                $amount = $this->getAmount($i);
                $date = date_create('0001-' . $i . '-01');
            }
            datefmt_set_pattern($fmt, 'MMMM');
            $month_name = datefmt_format($fmt, $date);
            $data = [
                'amount' => $amount,
                'month' => $month_name,
            ];
            array_push($report, $data);
        }
        return view('export.annualydistribution', [
            'reports' => $report,
            'year' => $year,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],

            // Styling a specific cell by coordinate.
            3 => ['font' => ['bold' => true]],
            4 => ['font' => ['bold' => true]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 4,
            'B' => 15,
            'C' => 10,
            'D' => 10,
            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 10,
        ];
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return 'Worksheet Program';
    }
}