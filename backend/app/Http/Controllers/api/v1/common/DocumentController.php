<?php

namespace App\Http\Controllers\api\v1\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Document;

class DocumentController extends Controller
{
    
    public function upload(Request $request) {
        
        $request->validate([
            'file' => 'required|max:2048',
        ]);
        
        $file = $request->file('file');

        $path = $file->getRealPath();
        $size = $file->getClientSize();
        $data = file_get_contents($path);
        $base64 = base64_encode(addslashes($data));

        $documento = new Document();
            
        $documento->user_id = Auth::user()->id;
        $documento->uid = '??';
        //$documento->documentable_type
        //$documento->documentable_id
        $documento->name    = $file->getClientOriginalName();
        $documento->size    = $size;
        $documento->mime    = mime_content_type($path);
        $documento->content = $base64;
        //$documento->description
                
        $documento->save();

        return response(['id' => $documento->id, 'uid' => $documento->uid], 201);
    }
    
    public function remove(Request $request, string $id) {
        
        /*
         * @todo validation owner
         */
        
        return response(['uuid' => 'SDASDFAS'], 200);
    }
    
}
