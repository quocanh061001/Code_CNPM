<?php  


namespace App\Http\Services\ThuongHieu;
use Illuminate\Support\Facades\Session;
use App\Models\thuonghieu;

class thuonghieuService
{
   public function create($request)
   {
      try{
         thuonghieu::create([
          'tenthuonghieu'=>(string) $request->input('thuonghieu'),
          'parent_Id'=>(int) $request->input('parent_Id')
         ]);
         Session::flash('success', 'Tạo thương hiệu thành công');
      }catch(\Exception $err){
        Session::flash('error', $err->getMessage());
        return false;
      }
      return true;
   }


}