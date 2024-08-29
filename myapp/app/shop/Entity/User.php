<?php
// 檔案位置：app/Shop/Entity/User.php
// 命名空間
namespace App\Shop\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model {
    // 資料表名稱
    protected $table = 'users';
    // 主鍵名稱
    protected $primaryKey = 'id';
    // 可以大量指定異動的欄位（Mass Assignment $fillable）
    protected $fillable = [
        "email",
        "password",
        "type",
        "nickname",
    ];
}