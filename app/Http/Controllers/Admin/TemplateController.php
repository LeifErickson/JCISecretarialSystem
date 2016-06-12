<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project as Project;
use Illuminate\Http\Request;
use URL;
use DateTime;
use File;

class TemplateController extends Controller
{
	public function header(){
		$URL = fopen(asset('/FrontEndImages/header/url.txt'), "r") or die("Unable to open file!");
		//$text =  fread($URL,filesize("url.txt"));
		$text = array();
		$count = 0;
		while(!feof($URL)) {
		  $text[$count++] = fgets($URL);
		}
		//dd($text);
		fclose($URL);
		return view('admin.template.header',['images' => $text]);
	}
	public function saveHeader(Request $request){
		//$url = asset(HTML::show_relative_path($file->getRealPath()));
		//dd($url);
		$file = fopen(public_path('FrontEndImages/header/url.txt'), "w") or die("Unable to open file!");
		$a = $request->input('header1');
		$b = $request->input('header2');
		$c = $request->input('header3');
		
		$text = $a."\n".$b."\n".$c; 
		
		
		fwrite($file,$text);
		fclose($file);
		return redirect('admin/template');
	}
	
	public function gallery(){
		$URL = fopen(asset('/FrontEndImages/gallery/url.txt'), "r") or die("Unable to open file!");

		$text = array();
		$count = 0;
		while(!feof($URL)) {
		  $text[$count++] = fgets($URL);
		}
		//dd($text);
		fclose($URL);
		return view('admin.template.gallery',['images' => $text]);
	}
	
	public function addgallery(Request $request){
		$urls = $request->input('urls');
		$file = fopen(public_path('FrontEndImages/gallery/url.txt'), "w") or die("Unable to open file!");
		$text = "";
		$url = explode("\n",$urls);
		foreach($url as $u){
			if(strcmp($u,"") !== 0){
				$text .= $u."\n";
			}
		}
		
		fwrite($file,$text);
		fclose($file);
		return redirect('admin/template/gallery');
	}
}
