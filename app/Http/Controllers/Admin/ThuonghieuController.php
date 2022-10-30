<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThuongHieu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\ThuongHieu\thuonghieuService;
use Psy\CodeCleaner\FunctionContextPass;

class ThuonghieuController extends Controller
{
    protected $thuonghieuService;
    public function __construct(thuonghieuService $thuonghieuService)
    {
        $this->thuonghieuService = $thuonghieuService;
    }

    public function create()
    {
        return view('admin.thuonghieu.add',[
            'title' => 'Thêm thương hiệu'
        ]);
    }

    public function store(CreateFormRequest $request){
       $result = $this->thuonghieuService->create($request);

       return redirect()->back();
    }
    
    public function index(){
        return view('admin.thuonghieu.list',[
            'title'=> 'Danh sách các thương hiệu',
            'thuonghieu' => $this->thuonghieuService->getAll()
        ]);
    }
}
