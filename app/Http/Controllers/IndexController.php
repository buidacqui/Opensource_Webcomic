<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter; 
use App\Models\Theloai; 
use App\Models\Sach; 
use App\Models\Publisher; 
use Carbon\Carbon;
use Session;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function register_publisher(Request $request){
        $data = $request->validate(
            [
                        'username' => 'required|unique:publishers|max:100',
                        'email' => 'required|unique:publishers|max:100',
        
                        'password' => 'required|required_with:password_confirmation|same:password|max:100',
                        'fullname' => 'required|max:150',
                        'sdt' => 'required|max:255',
                    ],
            [
                        'username.unique' => 'Tên username đã có, xin điền tên khác',
                        'email.unique' => 'Tên email đã có, xin điền tên khác',
                        'username.required' => 'Tên username phải có nhé',
                        'email.required' => 'Tên email phải có nhé',

                        'password.required' => 'Mật khẩu phải có nhé',
                        'fullname.required' => 'fullname phải có nhé',
                        'sdt.required' => 'Số điện thoại phải có nhé',

                    ]
                );
                $publisher = new Publisher();
                $publisher->email = $data['email'];
                $publisher->password = md5($data['password']);
        
                $publisher->username = $data['username'];
                $publisher->fullname = $data['fullname'];
                $publisher->sdt = $data['sdt'];
                $publisher->date_created =  Carbon::now('Asia/Ho_Chi_Minh');

                $publisher->save();
                return redirect()->back()->with('status','Đăng ký thành công');
    }
    public function dangky(){
        $theloai = Theloai::orderBy('id','DESC')->get();
        // $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        return view('pages.users.dangky')->with(compact('danhmuc','theloai'));
    }
  public function dangnhap(){
    $theloai = Theloai::orderBy('id','DESC')->get();
    // $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
    $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
    return view('pages.users.dangnhap')->with(compact('danhmuc','theloai'));
  }
  public function login_publisher(Request $request){
    $data = $request->validate(
        [
                    'username' => 'required',    
                    'password' => 'required',
                ],
        [
                    'username.required' => 'Tên username phải có nhé',
                    'password.required' => 'Mật khẩu phải có nhé',
                ]
            );
           $publisher = Publisher::where('username',$data['username'])->where('password',md5($data['password']))->first();
           if($publisher){
                    Session::put('login_publisher',true);
                    Session::put('publisher_id',$publisher->id);
                    Session::put('username',$publisher->username);
                    Session::put('email_publisher',$publisher->email);
                    return redirect()->back()->with('status','Đăng nhập thành công');

           }
           else{
            return redirect()->back()->with('status','Mật khẩu hoặc tên đăng nhập sai, vui lòng thử lại!');

           }
  }
  public function sign_out(){
                    Session::forget('login_publisher');
                    Session::forget('publisher_id');
                    Session::forget('username');
                    Session::forget('email_publisher');
                    return redirect()->back()->with('status','Đăng xuất thành công');

  }
    public function tabs_danhmuc(Request $request)
    {
        $danhmuc_id = $request->input('danhmuc_id');
        
        if (!$danhmuc_id) {
            return response()->json('Thiếu ID danh mục', 400);
        }
    
        try {
            $truyen = Truyen::where('danhmuc_id', $danhmuc_id)->get();
        } catch (\Exception $e) {
            return response()->json('Lỗi khi truy vấn truyện: ' . $e->getMessage(), 500);
        }
    
        $output = '';
        foreach ($truyen as $value) {
            $output .= '
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <a href="'.url('xem-truyen/'.$value->slug_truyen).'">
                        <img src="'.url('public/uploads/truyen/'.$value->hinhanh).'" 
                            class="card-img-top" 
                            style="height:250px; object-fit:cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">'.e($value->tentruyen).'</h5>
                        <p class="card-text">'.e(Str::limit($value->tomtat, 100)).'</p>
                    </div>
                </div>
            </div>';
        }
    
        return response()->json($output);
    }
    public function docsach() {
        // $info = Info::find(1);
        // $title = $info->tieude;
    
        // // SEO metadata
        // $meta_desc = $info->mota;
        // $meta_keywords = 'sachtruyen247, doc truyen tranh, doc truyen trinh tham, doc truyen tranh';
        // $url_canonical = URL::current();
        // $og_image = url('public/uploads/logo/' . $info->logo);
        // $link_icon = url('public/uploads/logo/' . $info->logo);
    
        // Lấy danh sách thể loại
        $theloai = TheLoai::orderBy('id', 'DESC')->get();
    
     
        // Lấy danh sách danh mục và sách
        $danhmuc = DanhmucTruyen::orderBy('id', 'DESC')->get();
        $sach = Sach::orderBy('id', 'DESC')->where('kichhoat', 0)->paginate(12);
    
        return view('pages.sach')->with(compact(
            'danhmuc', 'sach', 'theloai',
        ));
    }
    
    public function home(){
        $theloai = Theloai::orderBy('id','DESC')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(12)->get();
        return view('pages.home')->with(compact('danhmuc','truyen','theloai','slide_truyen'));
    }
    public function getAllTruyen()
    {
        // Lấy tất cả truyện
        $truyen = Truyen::all(); // Hoặc có thể tùy chỉnh theo logic của bạn

        return response()->json($truyen); // Trả về dữ liệu dưới dạng JSON
    }
    public function danhmuc($slug){
        $theloai = Theloai::orderBy('id','DESC')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $danhmuc_id = DanhmucTruyen::where('slug_danhmuc',$slug)->first();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('danhmuc_id',$danhmuc_id->id)->paginate(12);
        return view('pages.danhmuc')->with(compact('danhmuc','truyen','tendanhmuc','theloai','slide_truyen'));
    }
    public function theloai($slug){
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $theloai_id = Theloai::where('slug_theloai',$slug)->first();
        $tentheloai = $theloai_id->tentheloai;
        
        $truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->where('theloai_id',$theloai_id->id)->paginate(12);
        return view('pages.theloai')->with(compact('danhmuc','truyen','tentheloai','theloai','slide_truyen'));
    }
    public function xemsachnhanh(Request $request){
        $sach_id = $request->sach_id;
        $sach = Sach::find($sach_id);
        $output['tieude_sach'] = $sach->tensach;
        $output['noidung_sach'] = $sach->noidung;
        echo json_encode($output);
    }
    public function xemtruyen($slug){
        $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

        $theloai = Theloai::orderBy('id','DESC')->get();

        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen = Truyen::with('danhmuctruyen','theloai')->where('slug_truyen',$slug)->where('kichhoat',0)->first();

        $chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->get();

        $chapter_dau = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();
        $chapter_moinhat = Chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen->id)->first();
        $truyennoibat = Truyen::where('truyen_noibat',1)->take(20)->get();
        $truyenxemnhieu = Truyen::where('truyen_noibat',2)->take(20)->get();

        $cungdanhmuc = Truyen::with('danhmuctruyen','theloai')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotIn('id',[$truyen->id])->get();
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau','theloai','slide_truyen','chapter_moinhat','truyennoibat','truyenxemnhieu'));
    }
    public function xemchapter($slug)
        {
            $slide_truyen = Truyen::orderBy('id','DESC')->where('kichhoat',0)->take(8)->get();

            $theloai = Theloai::orderBy('id','DESC')->get();

            $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
            
            $truyen = Chapter::where('slug_chapter',$slug)->first();
                //breadcrumb
                $truyen_breadcrumb = Truyen::with('danhmuctruyen','theloai')->where('id',$truyen->truyen_id)->first();

                //end
            $chapter = Chapter::with('truyen')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();
            $all_chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();
            $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');
            $max_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();
            $min_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();

            $previous_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');
            $url_canonical = request()->url(); // Lấy URL hiện tại

            return view('pages.chapter')->with(compact('danhmuc','chapter','all_chapter','next_chapter','previous_chapter','max_id','min_id','theloai','truyen_breadcrumb','slide_truyen','url_canonical'));

        }
        public function timkiem(){
            $theloai = Theloai::orderBy('id','DESC')->get();
            $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

            $tukhoa = $_GET['tukhoa'];
            $truyen = Truyen::with('danhmuctruyen','theloai')->where('tentruyen','LIKE','%'.$tukhoa.'%')->orWhere('tomtat','LIKE','%'.$tukhoa.'%')->orWhere('tacgia','LIKE','%'.$tukhoa.'%')->get();
            return view('pages.timkiem')->with(compact('danhmuc','truyen','theloai','tukhoa'));
        }

}


