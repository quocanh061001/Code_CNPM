<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThuongHieu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\ThuongHieu\thuonghieuService;
use App\Models\thuonghieu;
use Psy\CodeCleaner\FunctionContextPass;

class ThuonghieuController extends Controller
{
    protected $thuonghieuService;
    private $htmlSelect;

    public function __construct(thuonghieuService $thuonghieuService)
    {
        $this->thuonghieuService = $thuonghieuService;
        $this->htmlSelect = '';
    }

    public function create()
    {
        $htmlOption = $this->thuonghieuRecursive(0);

        return view('admin.thuonghieu.add',[
            'title' => 'Thêm thương hiệu'
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

    public function store(CreateFormRequest $request){

       $result = $this->thuonghieuService->create($request);

       return redirect('admin/thuonghieu/index');
    }
    
    public function index(){
      $thuonghieu = thuonghieu::all();

        return view('admin.thuonghieu.list',[
            'title'=> 'Danh sách các thương hiệu'
        ])->with('thuonghieu', $thuonghieu);
    }

    //Edit function()
    public function edit($id)
    {
        $htmlOption = $this->thuonghieuRecursive(0);
        $thuonghieu = thuonghieu::find($id);
        return view('admin.thuonghieu.edit', [
            'title'=> 'Chỉnh sửa thương hiệu'
        ])->with('thuonghieu', $thuonghieu)->with('htmlOption', $htmlOption); 
    } 
    
    public function update($id ,Request $request){
        $thuonghieu = new thuonghieu();
        $thuonghieu->find($id)->update([
            'tenthuonghieu' => $request->thuonghieu,
            'parent_Id'=> $request->parent_Id
        ]);
        return redirect('admin/thuonghieu/index');  
    }
    //Delete function
    public function delete($id)
    {
        $thuonghieu = new thuonghieu();
        $thuonghieu->find($id)->delete();
        return redirect('admin/thuonghieu/index');  

    }
}
