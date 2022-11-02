<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\thuonghieu;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $htmlSelect;
    public function __construct()
    {
        $this->htmlSelect = '';
    }

    public function index(){
        return view('admin.products.list',[
            'title'=> 'Danh sách các sản phẩm'
        ]);
    }

    public function create(){
        $htmlOption = $this->thuonghieuRecursive(0);
        return view('admin.products.add',[
            'title' => 'Thêm sản phẩm'
        ])->with('htmlOption', $htmlOption);
    }

    function thuonghieuRecursive($id, $text= ''){
        $data = thuonghieu::all();
        foreach($data as $value){
            if($value['parent_Id'] == $id){
                $this->htmlSelect .= "<option value='" . $value['id'] . "'>" . $text .$value['tenthuonghieu'] . "</option>";
                $this->thuonghieuRecursive($value['id'], $text. '-');
            }
        }
        return $this->htmlSelect;
    }
}
