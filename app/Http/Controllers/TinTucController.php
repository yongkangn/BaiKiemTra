<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\DanhMuc;
use DateTime;
class TinTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$data= TinTuc::select()->get()->toArray();
        return view('news_list',['tin'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//`id`, `tieude`, `tacgia`, `trichdan`, `noidung`, `hinh`, `congbo`, `created_at`, `updated_at`
		$tintuc             = new TinTuc;
		$tintuc->tieude     =$request->txtTitle;
		$tintuc->tacgia     =$request->txtAuthor;
		$tintuc->trichdan   =$request->txtIntro;
		$tintuc->noidung    =$request->txtFull;
		$tintuc->hinh       =$request->newsImg;
		$tintuc->congbo     =$request->rdoPublic;
		$tintuc->danhmuc_id =$request->sltCate;
		$tintuc->created_at =new DateTime();
		$tintuc->save();
        return redirect()->route('list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$danhmuc= DanhMuc::select()->get()->toArray();
        $data= TinTuc::find($id)->toArray();
        return view('news_edit',['data'=>$data,'abc'=>$danhmuc]);
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
        $tintuc             = TinTuc::find($id);
		$tintuc->tieude     =$request->txtTitle;
		$tintuc->tacgia     =$request->txtAuthor;
		$tintuc->trichdan   =$request->txtIntro;
		$tintuc->noidung    =$request->txtFull;
		$tintuc->hinh       =$request->newsImg;
		$tintuc->congbo     =$request->rdoPublic;
		$tintuc->danhmuc_id =$request->sltCate;
		$tintuc->created_at =new DateTime();
		$tintuc->save();
        return redirect()->route('list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tintuc = TinTuc::find($id);

        $tintuc->delete();
        return redirect()->route('list');
    }
}
