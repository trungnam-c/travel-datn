<?php

namespace App\Exports;

use App\Models\detailLocationModel;
use App\Models\Location_Model;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; 
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet; 

class ExportCustomer implements  FromCollection , ShouldAutoSize,WithHeadings,WithEvents   
{
    /**
    * @return \Illuminate\Support\Collection
    */ 
    use Exportable;
    public $id;
    public $count;
    public $local;
    public $date;
    public function __construct(int $id)
    {
        $this->id = $id;
        $this->getLocation();
    }
    public function headings(): array
    {
        return [ 
            [
                "THÔNG TIN KHÁCH HÀNG ",
            ],
            [
                "Địa điểm","",$this->loca
            ],
            [
                "Ngày khởi hành","",$this->date
            ],
            [
                "ID vé", "Loại Vé", "Họ Tên KH", "Giới tính","Ngày sinh","ID Giấy tờ","Số điện thoại","Tiền vé"
            ]
            ];
    }
    public function getLocation()
    {
        $lcd = detailLocationModel::find($this->id)->first();
        $idlc = $lcd["idlocation"]; 
        $this->date = $lcd["ngaykhoihanh"] . " " . $lcd["giokhoihanh"]; 
        $lc = Location_Model::find($idlc)->first(); 
        $this->loca = $lc['diemdi'] . " - " . $lc['diemden'] ;
    }

    public function collection()
    {
        
        $sql = "SELECT ctdv.* from chitietdatve ctdv inner join datve dv on dv.idve = ctdv.idve WHERE dv.idlocation_detail = $this->id and dv.trangthai = 1;";
        $data = DB::select($sql);
        $this->count = count($data) + 5; 
        return collect($data ); 
    }
    public function registerEvents(): array
    {
        return [
            

            


            AfterSheet::class    => function(AfterSheet $event) {
                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM ,
                            'color' => ['argb' => 'rgb(0 0 0)'],
                        ],
                    ],
                ];
                $cellRange1 = 'A1:H1'; // All headers
                $event->sheet->mergeCells($cellRange1);
                $event->sheet->getDelegate()->getStyle($cellRange1)->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cellRange1)->getFont()->setSize(18);
                $event->sheet->getDelegate()->getStyle($cellRange1)->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle($cellRange1)->applyFromArray($styleArray);
                
                $cellRangelocal = 'A2:H2'; // All headers
                $event->sheet->mergeCells("A2:B2");
                $event->sheet->mergeCells("C2:H2");
                $event->sheet->getDelegate()->getStyle($cellRangelocal)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cellRangelocal)->getFont()->setBold(true);
 

                $cellRangedate = 'A3:H3';  
                $event->sheet->mergeCells("A3:B3");
                $event->sheet->mergeCells("C3:H3");
                $event->sheet->getDelegate()->getStyle($cellRangedate)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cellRangedate)->getFont()->setBold(true);



                $styleArray1 = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM ,
                            'color' => ['argb' => 'rgb(0 0 0)'],
                        ],
                    ],
                ];
                
                $cellRange1 = 'A4:H4'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange1)->getFont()->setSize(14);
                $event->sheet->getDelegate()->getStyle($cellRange1)->getFont()->setBold(true);
                $event->sheet->getDelegate()->getStyle("A1:H4")->applyFromArray($styleArray1);
                $event->sheet->getDelegate()->getStyle($cellRange1)->getAlignment()
                ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                 
                $styleArray2 = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ,
                            'color' => ['argb' => 'rgb(0 0 0)'],
                        ],
                    ],
                ];
                $event->sheet->getDelegate()->getStyle("A5:H".$this->count)->applyFromArray($styleArray2);
               

            },
        ];
    }
}
