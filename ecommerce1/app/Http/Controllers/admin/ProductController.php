<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;

use App\Brand;
use App\Category;
use App\Size;
use App\Product;
use App\ImageProduct;
use DateTime;
use File;
use Carbon\Carbon;
use App\ProductProperties;
class ProductController extends Controller
{
    public function getAddProduct()
    {

    	$cate = Category::all()->toArray();
    	return view('admin.product.add_product',compact('cate'));
    }

    public function postAddProduct(Request $request)
    {
    	$product = new Product;
        $product->product_name         = $request->product_name;
        $product->short_description     = $request->short_description;
        $product->full_description          = $request->full_description;
        $product->price      = $request->price;
        $product->sale_price = $request->sale_price;
        $product->is_new             = $request->is_new;
        $product->created_at      = new DateTime;
        $allowed = array('image/jpg','image/png','image/jpeg');

        if($product->save()){
            if ($request->hasFile('image_product')) {
                $file = $request->image_product;
                $file_name=$file->getClientOriginalName();
                $extension_file=$file->getClientOriginalExtension();
                $temp_file=$file->getRealPath();
                $file_size=$file->getSize();
                $file_type=$file->getMimeType();
                $file->move('upload', $file->getClientOriginalName());
                $product->image_product="upload/".$file->getClientOriginalName();
                $product->save();
            }
        }
        return redirect(route('listsanpham'))->with("message","Thêm sản phẩm thành công");
    }
    public function getListProduct()
    {
        $products = Product::orderBy('id','DESC')->get();

        return view('admin.product.list_product',compact('products'));
    }

    public function getEditProduct($id)
    {
        $cates = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit_product',compact('product','cates'));
    }
    public function getAddSize($id)
    {
        $sizes = Size::all();

        $product = Product::find($id);

        return view("admin.product.add_size", compact('sizes','product'));
    }
    public function postAddSize(Request $request, $id)
    {
        $this->validate($request,[
            "txtQuantity" => "required|numeric"
        ],[
            "txtQuantity.required" => "Bạn chưa nhập số lượng",
            "txtQuantity.numeric"  => "Số lượng phải là số",

        ]);

        $sizes = ProductProperties::where('product_id',$id)->where("size_id",$request->selectSizeId)->get()->toArray();
        if(count($sizes)>0){
            return redirect("admin/san-pham/size/them/".$id)->with('error','Size đã tồn tại');
        }else{
             $size = new ProductProperties;
            $size->product_id = $id;
            $size->size_id    = $request->selectSizeId;
            $size->quantity   = $request->txtQuantity;
            $size->save();

            return redirect("admin/san-pham/size/them/".$id)->with('message','Thêm size thành công');
        }

    }
    public function postEditProduct(Request $request, $id){

        $product = Product::find($id);
        $product->product_name         = $request->product_name;
        $product->short_description     = $request->short_description;
        $product->full_description          = $request->full_description;
        $product->price      = $request->price;
        $product->sale_price = $request->sale_price;
        $product->is_new             = $request->is_new;
        $product->created_at      = new DateTime;
        $allowed = array('image/jpg','image/png','image/jpeg');

        if($product->save()){
            if ($request->hasFile('image_product')) {
                $file = $request->image_product;
                $file_name=$file->getClientOriginalName();
                $extension_file=$file->getClientOriginalExtension();
                $temp_file=$file->getRealPath();
                $file_size=$file->getSize();
                $file_type=$file->getMimeType();
                $file->move('upload', $file->getClientOriginalName());
                $product->image_product="upload/".$file->getClientOriginalName();
                $product->save();
            }
        }
        return redirect(route('listsanpham'))->with("message","Thêm sản phẩm thành công");
    }

    public function getEditImage($id)
    {
        $image = ImageProduct::find($id);

        return view('admin.product.edit_image',compact('image'));
    }

    public function postEditImage($id, Request $request)
    {

        $image = ImageProduct::find($id);
        $image_name = $image->name;
        $image_path = "uploaded/product/".$image_name;
        if($request->hasFile('txtHinh')){
                $file = $request->file('txtHinh');
                $allowed = array('image/jpg','image/png','image/jpeg');
                $ext = $file->getClientOriginalExtension();
                $renamed = uniqid('_anh'). "." . $ext;
            if(in_array($file->getClientMimeType(),$allowed))
            {
                if($file->move('uploaded/product/',$renamed))
                {
                    $image->name = $renamed;
                    $image->save();
                    if(File::exists($image_path))
                    {
                        File::delete($image_path);
                    }
                }else{
                    return redirect('admin/san-pham/hinh/sua/'.$id)->with('error','Không the upload');
                }
            }else{
                return redirect('admin/san-pham/hinh/sua/'.$id)->with('error','Lỗi định dạng file');
            }
        }
        return redirect('admin/san-pham/hinh/sua/'.$id)->with('message','thanh cong');
    }

    public function postAjaxViewSize(Request $request)
    {
        $product_id = $request->product_id;
        $sizes = ProductProperties::where('product_id',$product_id)->get();
        if(count($sizes) > 0)
        {

            echo "<table>
                <tr>
                    <th style='width: 120px'>Size</th>
                    <th style='width: 120px'>Số lượng</th>
                </tr>";
            if(count($sizes)>0)
            {
                foreach($sizes as $size)
                {
                    echo  "<tr><td>";
                    $size_name = Size::find($size->size_id);
                    echo $size_name->name."</td><td>";
                    echo $size->quantity."</td></tr>";
                }
            }
            echo "</table> </div>";
        }else{
            echo "Chưa có size cho sản phẩm";
        }
    }
    public function postAjaxDelImage(Request $request)
    {
        $image_id = $request->id;

        $image = ImageProduct::find($image_id);
        $image_name = $image->name;
        $image->delete();
        $image_path = "uploaded/product/".$image_name;
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        echo "true";
    }
    public function postAjaxEditQuantity(Request $request)
    {
        $product_id = $request->product_id;
        $size_id    =  $request->size_id;
        $quantity   = $request->quantity;
        //QueryBuilder udpate table
        $quantity = DB::table('product_properties')->where('product_id',$product_id)->where('size_id',$size_id)->update(['quantity'=>$quantity]);
        echo "true";
    }

}
