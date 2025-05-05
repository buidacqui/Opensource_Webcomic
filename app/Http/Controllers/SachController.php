<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sach;
use Carbon\Carbon;
class SachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_sach = Sach::orderBy('id','DESC')->paginate(10);
        return view('admincp.sach.index')->with(compact('list_sach'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.sach.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                        'tensach' => 'required|max:255',
                        'slug_sach' => 'required|max:255',
                        'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                        'tomtat' => 'required',
                        'noidung' => 'required',

                        'tukhoa' => 'required',
                        'kichhoat' => 'required',
                        'views' => 'required',
                    ],
            [
                'views.required'    => 'Vui lòng nhập lượt xem',

                'slug_sach.unique'    => 'Tên sách đã có ,xin điền tên khác',
                'tensach.unique'      => 'Slug sách đã có ,xin điền slug khác',
                'tensach.required'    => 'Tên sách phải có nhé',
                'tomtat.required'       => 'Mô tả sách phải có nhé',
                'tukhoa.required'       => 'Tác giả sách phải có nhé',
                'noidung.required'       => 'Nội dung sách phải có nhé',

                'slug_sach.required'  => 'Slug sách phải có',
                'hinhanh.required'      => 'Hình ảnh sách phải có',
                    ]
                );
                $sach = new Sach();
                $sach->tensach = $data['tensach'];
                $sach->slug_sach = $data['slug_sach'];
                $sach->tomtat = $data['tomtat'];
                $sach->kichhoat = $data['kichhoat'];
                $sach->tukhoa = $data['tukhoa'];
                $sach->noidung = $data['noidung'];
                $sach->views = $data['views'];

                $sach->created_at = Carbon::now('Asia/Ho_Chi_Minh');

                $get_image = $request->hinhanh;
                $path = 'public/uploads/sach/';
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.', $get_name_image));
                    $new_image = $name_image . rand(0,99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move($path, $new_image);
                    $sach->hinhanh = $new_image;


                $sach->save();
                return redirect()->back()->with('status','Thêm sách thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sach = Sach::findOrFail($id);
        return view('admincp.sach.edit', compact('sach'));   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'tensach' => 'required|max:255',
            'slug_sach' => 'required|max:255|unique:sach,slug_sach,' . $id,
            'hinhanh' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'tomtat' => 'required',
            'noidung' => 'required',
            'tukhoa' => 'required',
            'kichhoat' => 'required',
            'views' => 'required',
        ], [
            'views.required' => 'Vui lòng nhập lượt xem',
            'slug_sach.unique' => 'Slug sách đã có, xin điền slug khác',
            'tomtat.required' => 'Mô tả sách phải có nhé',
            'tukhoa.required' => 'Tác giả sách phải có nhé',
            'noidung.required' => 'Nội dung sách phải có nhé',
            'slug_sach.required' => 'Slug sách phải có',
        ]);
    
        $sach = Sach::find($id);
        if (!$sach) {
            return redirect()->back()->with('error', 'Không tìm thấy sách');
        }
    
        $sach->tensach = $data['tensach'];
        $sach->slug_sach = $data['slug_sach'];
        $sach->tomtat = $data['tomtat'];
        $sach->kichhoat = $data['kichhoat'];
        $sach->tukhoa = $data['tukhoa'];
        $sach->noidung = $data['noidung'];
        $sach->views = $data['views'];
    
        $get_image = $request->file('hinhanh');
        if ($get_image) {
            $old_path = 'public/uploads/sach/'.$sach->hinhanh;
            if (file_exists($old_path)) {
                unlink($old_path);
            }
    
            $path = 'public/uploads/sach/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0,99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $sach->hinhanh = $new_image;
        }
    
        $sach->save();
    
        return redirect()->back()->with('status', 'Cập nhật sách thành công');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sach = Sach::find($id);
        $path = 'public/uploads/sach/'.$sach->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }
        Sach::find($id)->delete();
        return redirect()->back()->with('status','Xóa truyện thành công');    }
}
