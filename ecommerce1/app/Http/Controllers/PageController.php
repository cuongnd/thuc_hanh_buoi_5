<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\ProductProperties;
use App\Category;
use App\ImageProduct;
use App\Size;
use App\Coupon;
use \Cart;
use Session;
use App\Customer;
use App\Bills;
use App\DetailBill;
use App\Brand;
use App\User;
use Mail;
use App\UserActivation;
use App\Jobs\SendActivationMail;
use App\Jobs\SendBillInfoMail;
use App\Http\Requests\CustomerRequest;
use App\Http\Requests\UserRequest;
use App\Notifications\checkoutNoti;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
   protected $userActivation;

	public function __construct(UserActivation $userActivation)
	{
        //truyyền viewshare . loai san pham tới kahcs mọi trang trong page
		$cateShare = Category::get()->toArray();
        view()->share(['cateShare'=>$cateShare]);
        $this->userActivation = $userActivation;
	}
	function dang_ky(){
	    return view('user.dang_ky');
    }
	function gui_dang_ky(Request $request){
	    $full_name=$request->full_name;
        $user_name=$request->user_name;
	    return view('user.profile',compact('full_name','user_name'));
    }
    public function getIndexPage()
    {
    	$new_product = Product::where('is_new',1)->select('id','product_name','slug_name','price','image_product','unit_price','sale_price','is_new')->limit(5)->orderBy('id','desc')->get();

        $sale_product = Product::where('sale_price','>',0)->select('id','product_name','slug_name','price','image_product','unit_price','sale_price','is_new')->limit(5)->orderBy('id','desc')->get();

    	return view('page.index',compact('new_product','sale_product'));
    }
    public function guiThongTin(Request $request)
    {
        $full_name=$request->full_name;
        echo $full_name;
        return "hell0 33333333";
    }
    public function getCategory($id, Request $request)
    {   $id=$request->id;
        $list_new_product = Product::where('is_new',1)->select('id','name','slug_name','price','image_product','unit_price','promotion_price','is_new')->where('category_id',$id)->limit(5)->orderBy('id','desc')->get();


        return view('page.category',compact('list_new_product'));
    }
    public function getDetailProduct($id)
    {
        $product        = Product::find($id);

        return view('page.detail',compact('product'));

    }

    public function getShowCart(){
        return view('page.cart');
    }

    public function getShowCheckout(){
        return view('page.checkout');
    }

    public function postCheckout(Request $request){

        //Kiêm tra xem số lượng mỗi sản phẩm có còn trong kho hàng nữa không
        $flag = true;
        $list_soil_out = "";
        $total=0;
        foreach(Cart::content() as $row)
        {
            $total+=$row->qty*$row->price;
        }
        $customer = new Customer;
        $customer->email      = $request->email;
        $customer->full_name = $request->full_name;
        $customer->phone  = $request->phone_number;
        $customer->address     = $request->address;
        if(Auth::check()) {
            $customer->user_id = Auth::user()->id;
        }
        if($customer->save())
        {
            $customer_id       = Customer::max('id');
            $bill = new Bills;
            $bill->customer_id = $customer_id;
            $bill->total_price = $total;
            if($bill->save()){
                $bill_id  = Bills::max('id');
                foreach(Cart::content() as $cart){
                    $detail_bill             = new DetailBill;
                    $detail_bill->bill_id    = $bill_id;
                    $detail_bill->product_id = $cart->id;
                    $detail_bill->quantity   = $cart->qty;
                    $detail_bill->price   = $cart->price;
                    $detail_bill->save();
                }
            }
        }
        Cart::destroy();
        return redirect('thanh-toan')->with('success',"Thanh toán thành công. Bạn có thể kiểm tra email thanh toán để xem đơn hàng, Nhấp vào <a href='". route('trang-chu')."' style='color:#333' >đây</a> để về trang chủ");
    }

    public function getDangKy()
    {
        if(Auth::check()){
            return redirect('/');
        }
        return view('page.register');
    }
    public function postDangKy(Request $request)
    {


         if($request->txtPass != $request->txtConfirmPass){
            return redirect('dang-ky')->with('loi','Mật khẩu không trùng khớp');
        }else{
            $user = new User;
            $user->first_name = $request->txtFirstName;
            $user->last_name  = $request->txtLastName;
            $user->email      = $request->txtEmail;
            $user->password   = bcrypt($request->txtPass);
            $user->save();
            $token = $this->userActivation->createActivation($user);
            $activation_link = route('activation', $token);
            // dispatch jobs
            dispatch(new SendActivationMail($user, $activation_link));
            return redirect('dang-ky')->with('thongbao',"Đăng kí thành công. Bạn vui lòng kiểm tra email để kích hoạt tài khoản");
        }
    }

    public function getActivationUser($token){
        // kiểm tra token có tồn tại không
        $activation = $this->userActivation->getActivationByToken($token);
        if($activation){
            $user = User::find($activation->user_id);
            $user->active = 1;
            $user->save();
            auth()->login($user); // login
            $this->userActivation->deleteActivation($token);
        }
        return redirect( route('trang-chu'));
    }
    public function getDangXuat(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect('/');
    }

    public function getUserProfile(){
        return view('page.user_profile');
    }
    public function postEditProfile(CustomerRequest $request){
        $id = Auth::user()->id;
        $this->validate($request,[
            'txtEmail' => 'unique:users,email,'.$id
        ],[
            "txtEmail.unique" => "Email của bạn đã tồn tại"
        ]);
        $user = User::find($id);
        $user->email      = $request->txtEmail;
        $user->first_name = $request->txtFirstName;
        $user->last_name  = $request->txtLastName;
        $user->gender     = $request->txtGender;
        $user->address    = $request->txtAddress;
        $user->phone      = $request->txtPhone;
        $user->save();

        return redirect(route('user.profile'))->with('success','Thành công');
    }

    public function getChangePassword(){

        return view('page.password');

    }
    public function getIndexPageTinTuc(Request $request){
        return view('page.tin_tuc');

    }
    public function getIndexPageDetailTinTuc(Request $request){
        return view('page.detail_tin_tuc');

    }
    public function PostChangePassword(Request $request){
       $this->validate($request, [
            "txtOldPassword" => "required",
            "txtNewPassword" => "required|min:6",
            "txtConfirmPass" => "required"
       ],[
            "txtOldPassword.required" => "Bạn phải nhập mật khẩu cũ",
            "txtNewPassword.required" => "Bạn phải nhập mật khẩu mới",
            "txtNewPassword.min" => "Mật khẩu mới phải có ít nhất 6 kí tự",
            "txtConfirmPass.required" => "Bạn phải nhập lại mật khẩu mới",
       ]);
       if(Hash::check($request->txtOldPassword, Auth::user()->password)){
           if($request->txtNewPassword == $request->txtConfirmPass){
               $user = User::find(Auth::user()->id);
               $user->password = bcrypt($request->txtNewPassword);
               $user->save();
               return redirect(route("get.password"))->with('success','Đổi mật khẩu thành công');
           }else{
               return redirect(route("get.password"))->with('error','Mật khẩu confirm phải trùng khớp');
           }
       }else{
           return redirect(route("get.password"))->with('error','Mật khẩu cũ không chính xác');
       }
    }
    public function getLogin(){
        if(Auth::check()){
            return redirect(route('trang-chu'));
        }else{
            return view('page.login');
        }
    }
    public function postLogin(Request $request){

        $credentials = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
            'active' => 1
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('trang-chu');
        }else{
            return redirect(route('get.login'))->with('error','Sai email, mật khẩu hoặc tài khoản của bạn chưa được kích hoạt');
        }
    }
    public function getListBill(){
        // get list bill of user
        $customers = Customer::where('user_id',Auth::user()->id)->paginate(5);

        return view('page.list_bill',compact('customers'));

    }
}
