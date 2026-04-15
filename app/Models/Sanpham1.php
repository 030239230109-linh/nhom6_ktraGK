<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham1 extends Model
{
    protected $table = 'san_pham';
protected $fillable = [
    'code',
    'ten_san_pham',
    'ten_khoa_hoc',
    'ten_thong_thuong',
    'mo_ta',
    'do_kho',
    'yeu_cau_anh_sang',
    'nhu_cau_nuoc',
    'gia_ban',
    'hinh_anh',
    'status'
];
    public $timestamps = false; // ✅ thêm dòng này
}