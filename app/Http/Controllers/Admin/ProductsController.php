<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HinhAnh;
use App\Models\Product;
use App\Models\thuonghieu;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
class ProductsController extends Controller
{
    use StorageImageTrait;

    private $htmlSelect;
    private $product;
    private $productImage;
    public function __construct(Product $product, HinhAnh $productImage)
    {
        $this->htmlSelect = '';
        $this->product = $product;
        $this->productImage = $productImage;
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

    public function store(Request $request){
        try{
            if(DB::table('products')->where('name', $request->name)->exists()){
                $message = 'Sản phẩm đã tồn tại';
                return redirect('admin/products/add')->with('message', $message);
            }
            else{

            
            $dataProductCreate = [
                'name' => $request->name,
                'giaban' => $request->giaban,
                'content' => $request->contents,
                'chitietsp' => $request->chitietsp,
                'mathuonghieu' => $request->mathuonghieu
            ];
    
            $dataUploadImage = $this->storageTraitUpload($request, 'image_path', 'product');
            if (!empty($dataUploadImage)) {
                $dataProductCreate['image_name'] = $dataUploadImage['file_name'];
                $dataProductCreate['image_path'] = $dataUploadImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
    
              // Insert data to product_images
              if ($request->hasFile('image_detail')) {
                foreach ($request->image_detail as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
    
                    ]);
    
                }
            } 
            //insert sp-size
           $query1 = DB::table('products')->where('name', $request->name)->value('id');
           $sizes_list = DB::table('sizes')->get();
           foreach($sizes_list as $item){
              DB::table('sp_sizes')->insert([
               'sp_id'=> $query1,
               'size_id'=> $item->id
              ]);
           } 
           DB::commit();
           return redirect('admin/products/index');}
        }catch(\Exception $exception){
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());

        }
      
    }
}
