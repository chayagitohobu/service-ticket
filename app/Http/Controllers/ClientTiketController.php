<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Path\To\DOMdocument;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Division;
use App\Models\Message;


class ClientTiketController extends Controller
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

        $user_id = Auth::guard('client')->user()->id;
        $messages = DB::table('messages')
            ->where('messages.client_id', '=', $user_id)
            ->join('divisions', 'messages.division_id', 'divisions.id')
            ->select(
                'messages.id',
                'messages.title',
                'messages.status',
                'messages.created_at',
                'messages.newest_reply',
                'divisions.division'
            )
            ->paginate(8);

        $divisions = Division::all();
        return view('client.tiket')
            ->with('divisions', $divisions)
            ->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user =  Auth::guard('client')->user();
        $divisions = Division::all();

        return view('client.create_tiket')
            ->with('user', $user)
            ->with('divisions', $divisions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

        if (!empty($request->detail)) {
            $storage = 'storage/tiket';
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            // $dom->loadHTML($request->detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
            $dom->loadHTML($request->detail);
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

        $message = new Message;
        $message->title = $request->input('title');
        // $message->detail = $request->input('ket');
        if (!empty($request->detail)) {
            $message->detail = $dom->saveHTML();
        } else {
            $message->detail = null;
        }
        $message->priority = $request->input('priority');
        $message->status = 'Open';
        $message->division_id = $request->input('division');
        $message->client_id = Auth::guard('client')->user()->id;
        $message->file = $store_file;
        $message->newest_reply = now();
        $message->save();

        return redirect('client/tiket')->with('success', 'Tiket berhasil dibuat !');
    }

    public function tutupTiket($id)
    {
        $message = Message::find($id);
        $message->status = 'Close';
        $message->save();
        return redirect('client/tiket')->with('success', 'Tiket berhasil di tutup !!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = DB::table('messages')
            ->where('messages.id', $id)
            ->leftJoin('users', 'messages.user_id', '=', 'users.id')
            ->leftJoin('clients', 'messages.client_id', '=', 'clients.id')
            ->join('divisions', 'messages.division_id', '=', 'divisions.id')
            ->select(
                'messages.id',
                'messages.status',
                'messages.priority',
                'messages.detail',
                'messages.updated_at',
                'messages.newest_reply',
                'messages.created_at',
                'messages.file',
                'divisions.id as division_id',
                'divisions.division',
                'users.role_id',
                'clients.name as client_name',
                'users.name as user_name',

            )
            ->get()
            ->first();

        if (empty($message->file)) {
            $message_files = null;
        } else {
            $message_file = $message->file;
            $remove = ['"', '[', ']'];
            $message_file_remove = str_replace($remove, ' ', $message_file);

            $message_files = explode(',', $message_file_remove);
        }

        $replies = DB::table('replies')
            ->where('replies.message_id', $id)
            ->leftJoin('users', 'replies.user_id', '=', 'users.id')
            ->leftJoin('clients', 'replies.client_id', '=', 'clients.id')
            ->select(
                'users.role_id',
                'users.name as user_name',
                'clients.name as client_name',
                'replies.created_at',
                'replies.reply',
                'replies.file',
                'replies.id'
            )
            ->orderBy('replies.created_at', 'DESC')
            ->get();

        if (empty($replies)) {
            $reply_file_array = null;
        } else {
            foreach ($replies as $reply) {
                // if (empty($reply->file)) {
                //     $reply_file_array = null;
                // } else {
                $reply_file = $reply->file;
                $remove = ['"', '[', ']'];
                $reply_file_remove = str_replace($remove, ' ', $reply_file);
                $reply_file = explode(',', $reply_file_remove);
                $reply_file_array[] = $reply_file;
                // }
            }
        }

        if (empty($reply_file_array)) {
            $reply_file_array = null;
        } else {
            $reply_file_array[] = $reply_file;
        }

        return view('client.balasan')
            ->with('message', $message)
            ->with('replies', $replies)
            ->with('message_files', $message_files)
            ->with('reply_file_array', $reply_file_array);
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
