<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreShortUrlRequest;
use App\Models\UrlShortener;
use Bitly;
use DataTables;

class UrlController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) 
        {
            $topurls = UrlShortener::latest()->limit(100)->get();
            return Datatables::of($topurls)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {                	
                    $short_url = '<a href="javascript:void(0);" class="url">'.$row->short_url.'</a>';
                    return $short_url;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('showtopurls');
	}

	public function add()
	{
		return view('addurl');
	} 

	public function store(StoreShortUrlRequest $request)
	{
		$bitlyUrl = Bitly::getUrl($request->get('url'));
		
		$insert_data = UrlShortener::create([
			'title' => $request->get('title'),
			'url' => $request->get('url'),
			'short_url' => $bitlyUrl,
			'nsfw' => $request->get('nsfw') ? $request->get('nsfw') : '0',
		]);

		$notification = array(
      		'message' => 'Uploaded Successfully!!!', 
      		'alert-type' => 'success',
    	);	

		return redirect('/')->with($notification);
	}
}