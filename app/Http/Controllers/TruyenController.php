<?php

namespace App\Http\Controllers;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;

use Illuminate\Http\Request;

class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_truyen = Truyen::with('danhmuctruyen')->orderBy('id','DESC')->get();
        return view ('admincp.truyen.index')->with(compact('list_truyen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        return view ('admincp.truyen.create')->with(compact('danhmuc'));
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
                        'tentruyen' => 'required|max:255',
                        'slug_truyen' => 'required|max:255',
                        'hinhanh' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
                        'tomtat' => 'required',
                        'tacgia' => 'required',
                        'kichhoat' => 'required',
                        'danhmuc' => 'required',
                    ],
            [
        
                'slug_truyen.unique'    => 'Tên truyện đã có ,xin điền tên khác',
                'tentruyen.unique'      => 'Slug truyện đã có ,xin điền slug khác',
                'tentruyen.required'    => 'Tên truyện phải có nhé',
                'tomtat.required'       => 'Mô tả truyện phải có nhé',
                'tacgia.required'       => 'Tác giả truyện phải có nhé',
                'slug_truyen.required'  => 'Slug truyện phải có',
                'hinhanh.required'      => 'Hình ảnh truyện phải có',
                    ]
                );
                $truyen = new Truyen();
                $truyen->tentruyen = $data['tentruyen'];
                $truyen->slug_truyen = $data['slug_truyen'];
        
                $truyen->tomtat = $data['tomtat'];
                $truyen->kichhoat = $data['kichhoat'];
                $truyen->tacgia = $data['tacgia'];

                $truyen->danhmuc_id = $data['danhmuc'];

                $get_image = $request->hinhanh;
                $path = 'public/uploads/truyen/';
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.', $get_name_image));
                    $new_image = $name_image . rand(0,99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move($path, $new_image);
                    $truyen->hinhanh = $new_image;


                $truyen->save();
                return redirect()->back()->with('status','Thêm truyện thành công');
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
        $truyen = Truyen::find($id);
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();

        return view ('admincp.truyen.edit')->with(compact('truyen','danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                        'tentruyen' => 'required|unique:truyen|max:255',
                        'slug_truyen' => 'required|unique:truyen|max:255',
                        'tacgia' => 'required',

                        'tomtat' => 'required',

                        'kichhoat' => 'required',
                        
                        'danhmuc' => 'required',
                    ],
            [
        
                        'tentruyen.required' => 'Tên truyện phải có nhé',
                        'tomtat.required' => 'Mô tả truyện phải có nhé',
                        'tacgia.required'       => 'Tác giả truyện phải có nhé',

                        'slug_truyen.required' => 'Slug truyện phải có',
                    ]
                );
                $truyen = Truyen::find($id);
                $truyen->tentruyen = $data['tentruyen'];
                $truyen->slug_truyen = $data['slug_truyen'];
        
                $truyen->tomtat = $data['tomtat'];
                $truyen->kichhoat = $data['kichhoat'];
                $truyen->tacgia = $data['tacgia'];

                $truyen->danhmuc_id = $data['danhmuc'];

                $get_image = $request->hinhanh;
                if($get_image){
                    $path = 'public/uploads/truyen/'.$truyen->hinhanh;
                    if(file_exists($path)){
                        unlink($path.$truyen->hinhanh);
                    }
                $path = 'public/uploads/truyen/';
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.', $get_name_image));
                    $new_image = $name_image . rand(0,99) . '.' . $get_image->getClientOriginalExtension();
                    $get_image->move($path, $new_image);
                    $truyen->hinhanh = $new_image;
                }
                $truyen->save();
                return redirect()->back()->with('status','Cập nhật truyện thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $truyen = Truyen::find($id);
        $path = 'public/uploads/truyen/'.$truyen->hinhanh;
        if(file_exists($path)){
            unlink($path);
        }
        Truyen::find($id)->delete();
        return redirect()->back()->with('status','Xóa truyện thành công');
    }
}
