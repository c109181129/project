<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\shop\Entity\Merchandise;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class MerchandiseController extends Controller
{
    public function MerchandiseCreate(){
        
        // 建立商品基本資訊
        $merchandise_data = [
            'status'          => 'C',   // 建立中
            'name'            => '',    // 商品名稱
            'name_en'         => '',    // 商品英文名稱
            'introduction'    => '',    // 商品介紹
            'introduction_en' => '',    // 商品英文介紹
            'photo'           => null,  // 商品照片
            'price'           => 0,     // 價格
            'remain_count'    => 0,     // 商品剩餘數量
        ];
        $Merchandise = Merchandise::create($merchandise_data);
        
        // 重新導向至商品編輯頁
        return redirect('/merchandise/' . $Merchandise->id . '/edit');
    }
    public function MerchandiseEdit($merchandise_id)
    {
        $Merchandise = Merchandise::where('id', $merchandise_id)->first();    //抓Merchandise裡面的$merchandise_id帶入到'id'裡面
        $binding = [                                    //在edit.blade.php裡面的<h1>{{ $title }}</h1>
            'title' => '編輯商品',
            'Merchandise' => $Merchandise,
        ];
        return view('merchandise.edit', $binding);
    }

    public function MerchandiseEditProcess($merchandise_id)
    {
        // 撈取商品資料
        $Merchandise = Merchandise::findOrFail($merchandise_id);    //findOrFail只會抓第一個值，這串程式為ID
        // 接收輸入資料
        $input = request()->all();       //回傳所有
        //dd($input) //return $input
        // if ( 錯誤判斷 ) {
        //     // 資料驗證錯誤
        //     return redirect('/merchandise/' . $Merchandise->id . '/edit')
        //         ->withErrors($validator)
        //         ->withInput();
        // }


        if (isset($input['photo'])){
            // 有上傳圖片
            $photo = $input['photo'];
            // 檔案副檔名
            $file_extension = $photo->getClientOriginalExtension();
            // 產生自訂隨機檔案名稱
            $file_name = uniqid() . '.' . $file_extension;
            // 檔案相對路徑
            $file_relative_path = 'images/merchandise/';
            // 檔案存放目錄為對外公開 public 目錄下的相對位置
            $file_path = public_path($file_relative_path);
            // 裁切圖片
            //$image = Image::make($photo)->fit(450, 300)->save($file_path);(舊版程式，現在的要改成下面那個)
            $photo->move($file_path , $file_name);
            // 設定圖片檔案相對位置
            $input['photo'] = $file_relative_path . $file_name;
        }

        // 商品資料更新
        $Merchandise->update($input);

        // 重新導向到商品編輯頁
        return redirect('/merchandise/' . $Merchandise->id . '/edit');
    }

    // 商品管理清單檢視
    public function MerchandiseManage()
    {
        $row_per_page = 20;
        $MerchandisePaginate = Merchandise::OrderBy('created_at', 'desc')
            ->paginate($row_per_page);

        // 設定商品圖片網址
        foreach ($MerchandisePaginate as &$Merchandise) {
            if (!is_null($Merchandise->photo)) {
                // 設定商品照片網址
                $Merchandise->photo = url($Merchandise->photo);
            }
        }
        //dd($MerchandisePaginate) ;
        $binding = [
            'title' => '商品管理',
            'MerchandisePaginate'=> $MerchandisePaginate,
        ];

        return view('merchandise.manage', $binding);
    }

    public function MerchandiseDelete($merchandise_id)
    {

        $Merchandise = Merchandise::where('id', $merchandise_id)->delete();

        return redirect(route('merchandise.manage'));
    }


    public function MerchandiseShop()
    {
        $row_per_page = 20;
        $MerchandisePaginate = Merchandise::OrderBy('created_at', 'desc')
            ->paginate($row_per_page);

        // 設定商品圖片網址
        foreach ($MerchandisePaginate as &$Merchandise) {
            if (!is_null($Merchandise->photo)) {
                // 設定商品照片網址
                $Merchandise->photo = url($Merchandise->photo);
            }
        }

        $binding = [
            'title' => '商品頁面',
            'MerchandisePaginate'=> $MerchandisePaginate,
        ];

        return view('merchandise.shop', $binding);
    }

    public function MerchandiseThing($merchandise_id)
    {
        // 获取商品
        $merchandise = Merchandise::findOrFail($merchandise_id);

        // 设置页面标题
        $title = $merchandise->name;
        //dd($merchandise);
        // 返回视图并传递变量
        return view('merchandise.thing', [
            'merchandise' => $merchandise,
            'title' => $title
        ]);
    }
    
    public function MerchandiseSearch(Request $request)
    {
        // 從請求中獲取搜尋關鍵字
        $searchQuery = $request->input('q');
        
        // 根據搜尋關鍵字查詢商品
        $merchandises = Merchandise::where('name', 'like', '%' . $searchQuery . '%')->get();
        
        $title = '搜尋結果';
        // 傳遞查詢結果到視圖
        return view('merchandise.search', [
            'merchandises' => $merchandises,
            'searchQuery' => $searchQuery,
            'title' => $title
        ]);
    }
}
