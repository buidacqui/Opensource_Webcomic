<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter; 
use App\Models\Theloai; 
use Illuminate\Support\Str;

class IndexController extends Controller
{
  
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


