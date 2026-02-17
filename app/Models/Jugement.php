<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugement extends Model
{
    use HasFactory;

    protected $table = 'jugement';
    protected $primaryKey = 'id';

    // Add this to handle Arabic column names
    protected $fillable = [
        'رقم تأجير',
        'الاسم و النسب',
        'الإطار',
        'نوع العملية',
        'الفترة',
        'ملاحظات',
        'الاكاديمية',
        'المديرية الإقليمية',
        'ملاحظات1',
        'تاريخ التسوية',
        'مبلغ التعويض',
        'تاريخ الالتحاق',
        'التسوية النهائية',
        'منفذة أو غير منفذة'
    ];

    // Cast dates properly
    protected $dates = ['تاريخ التسوية', 'تاريخ الالتحاق'];
}
