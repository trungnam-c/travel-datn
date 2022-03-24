<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Exportable; 

class ExportCustomer implements FromCollection , ShouldAutoSize,WithHeadingRow
{
    /**
    * @return \Illuminate\Support\Collection
    */ 
    use Exportable;
    public $id;
    public function __construct(int $id)
    {
        $this->id = $id;
    }
    public function headings(): array
    {
        return ["ID vé", "Loại Vé", "Họ Tên KH", "Giới tính","Ngày sinh","ID Giấy tờ","Số điện thoại","Tiền vé"];
    }


    public function collection()
    {
        $sql = "SELECT ctdv.* from chitietdatve ctdv inner join datve dv on dv.idve = ctdv.idve WHERE dv.idlocation_detail = $this->id and dv.trangthai = 1;";
        $data = DB::select($sql);
        return collect($data ); 
    }
}
