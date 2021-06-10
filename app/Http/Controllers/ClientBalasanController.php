<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reply;
use App\Models\Message;
use PDO;
use Path\To\DOMdocument;
use Intervention\Image\ImageManagerStatic as Image;


class ClientBalasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Auth::guard('client')->user();

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '-' . $file->getClientOriginalName();
                $remove = ['"', '[', ']', ','];
                $files_name_replaced = str_replace($remove, ' ', $filename);
                $file->move(storage_path('files'), $files_name_replaced);
                $files[] = $files_name_replaced;
            }
        } else {
            $files = null;
        }

        if ($files == null) {
            $store_file = null;
        } else {
            $store_file = json_encode($files);
        }

        if (!empty($request->reply)) {
            $storage = 'storage/tiket';
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            // $dom->loadHTML($request->reply, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $dom->loadHTML($request->reply);
            libxml_clear_errors();
            $images = $dom->getElementsByTagName('img');
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                if (preg_match('/data:image/', $src)) {
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $group);
                    $mimetype = $group['mime'];
                    $fileNameContent = uniqid();
                    $fileNameContentRand = substr(md5($fileNameContent), 6, 6) . '_' . time();
                    $filepath = ("$storage/$fileNameContentRand.$mimetype");
                    $image = Image::make($src)
                        ->encode($mimetype, 100)
                        ->save($filepath);
                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);
                    $img->setAttribute('class', 'img-fluid');
                }
            }
        }

        $replies = new Reply;
        $replies->message_id = $request->input('message_id');
        $replies->client_id = $client->id;
        // $replies->reply = $request->input('balasan');
        if (!empty($request->reply)) {
            $replies->reply = $dom->saveHTML();
        } else {
            $replies->reply = null;
        }
        $replies->file = $store_file;

        $replies->save();

        $message = Message::find($request->input('message_id'));
        $message->newest_reply = now();
        $message->status = 'client reply';
        $message->save();

        return back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
