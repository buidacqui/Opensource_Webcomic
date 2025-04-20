<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theloai;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theloai = Theloai::orderBy('id','DESC')->get();
        return view ('admincp.theloai.index')->with(compact('theloai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admincp.theloai.create');
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
                        'tentheloai' => 'required|unique:danhmuc|max:255',
                        'slug_theloai' => 'required|unique:danhmuc|max:255',
        
                        'mota' => 'required|max:255',
                        'kichhoat' => 'required',
                    ],
            [
                        'slug_theloai.unique' => 'Tên thể loại đã có, xin điền tên khác',
                        'tentheloai.unique' => 'Slug thể loại đã có, xin điền tên khác',
        
                        'tentheloai.required' => 'Tên danh mục phải có nhé',
                        'mota.required' => 'Mô tả danh mục phải có nhé',
                    ]
                );
                $theloai = new Theloai();
                $theloai->tentheloai = $data['tentheloai'];
                $theloai->slug_theloai = $data['slug_theloai'];
        
                $theloai->mota = $data['mota'];
                $theloai->kichhoat = $data['kichhoat'];
                $theloai->save();
                return redirect()->back()->with('status','Thêm thể loại thành công');
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
        $theloai =Theloai::find($id);
        return view ('admincp.theloai.edit')->with(compact('theloai'));    }

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
                'tentheloai' => 'required|max:255',
                'slug_theloai' => 'required|max:255',
                'mota' => 'required|max:255',
                'kichhoat' => 'required|max:255',

            ],
            [
                'tentheloai.required' => 'Tên thể loại phải có nhé',
                'mota.required' => 'Mô tả thể loại phải có nhé',

            ]
            );
            $theloai = Theloai::find($id);
            $theloai ->tentheloai = $data['tentheloai'];
            $theloai ->slug_theloai = $data['slug_theloai'];
            $theloai ->mota = $data['mota'];
            $theloai ->kichhoat = $data['kichhoat'];
            $theloai ->save();
            return redirect()->back()->with('status','Cập nhật thể loại thành công');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TheLoai::find($id)->delete();
        return redirect()->back()->with('status','Xóa thể loại thành công');

    }
}
