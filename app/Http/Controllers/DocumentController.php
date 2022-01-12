<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Renter;
use App\Models\Folder;
use DB;

class DocumentController extends Controller
{
    //createFolder
    public function createFolder(Request $request){
        $property_data = Renter::where('id',$request->property_id)->get();  
        $renter_id = DB::table('folders')->insertGetId([
          'user_id' => auth()->user()->id,
          'property_id' =>  $request->property_id,
          'renter_id' =>   $property_data[0]['id'],
          'folder_name' => $request->folder_name,
      ]);

      $folder_data = DB::table('folders')->where('renter_id', $renter_id)->get();  
      return response()->json([
          'message' => 'Folder has been created',
          'document'=> $folder_data 
      ], 201);
    }     
    
    //Add Document
    public function addDocument(Request $request){

        $folder_data = Folder::where('id',$request->folder_id)->get();  
        $images=$request->file('file');
        // dd($images);
        $imageName='';
        if($images){
            foreach($images as $image){
            $new_name=rand().'.'.  $image->getClientOriginalExtension();
            $path= $image->move(public_path('/uploads/propertydocuments'),$new_name);
            $imageName=$new_name;
            $save = new Document(); 
            $save->user_id = auth()->user()->id;
            $save->folder_id=$folder_data[0]['id'];
            $save->renter_id=$folder_data[0]['renter_id'];
            $save->property_id=$folder_data[0]['property_id'];
            $save->folder_name=$folder_data[0]['folder_name'];
            $save->name = $imageName;
            $save->path = $path;
            $save->save();
            }}    
        $document_data = DB::table('documents')->where('folder_id',$request->folder_id)->get();  
        return response()->json([
            'message' => 'Documents has been added',
            'document'=>$document_data
        ], 201);
    }
}
