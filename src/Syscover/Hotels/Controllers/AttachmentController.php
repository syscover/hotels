<?php namespace Syscover\Hotels\Controllers;

/**
 * @package	    Hotels
 * @author	    Jose Carlos Rodríguez Palacín
 * @copyright   Copyright (c) 2015, SYSCOVER, SL
 * @license
 * @link		http://www.syscover.com
 * @since		Version 2.0
 * @filesource
 */

use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\File;
use Syscover\Hotels\Models\Attachment;
use Syscover\Pulsar\Controllers\Controller;

class AttachmentController extends Controller {

    public function storeAttachment(HttpRequest $request)
    {
        $parameters             = $request->route()->parameters();
        $attachments            = $request->input('attachments');
        $attachmentsResponse    = [];

        foreach($attachments as $attachment)
        {
            $idAttachment = Attachment::max('id_156');
            $idAttachment++;

            // move file from temp file to attachment folder
            File::move(public_path() . config('hotels.tmpFolder') . '/' . $attachment['fileName'], public_path() . config('hotels.attachmentFolder') . '/' . $parameters['article'] . '/' . $parameters['lang'] . '/' . $attachment['fileName']);

            $attachmentsResponse[] = Attachment::create([
                'id_156'                => $idAttachment,
                'lang_156'              => $parameters['lang'],
                'hotel_156'           => $parameters['article'],
                'family_156'            => null,
                'library_156'           => $attachment['library'],
                'library_file_name_156' => $attachment['libraryFileName'],
                'sorting_156'           => null,
                'name_156'              => null,
                'file_name_156'         => $attachment['fileName'],
                'mime_156'              => $attachment['mime'],
                'size_156'              => filesize(public_path() . config('hotels.attachmentFolder') . '/' . $parameters['article'] . '/' . $parameters['lang'] . '/' . $attachment['fileName']),
                'type_156'              => $attachment['type']['id'],
                'type_text_156'         => $attachment['type']['name'],
                'width_156'             => $attachment['width'],
                'height_156'            => $attachment['height'],
                'data_156'              => json_encode(['icon' => $attachment['type']['icon']])
            ]);
        }

        $response = [
            'success'       => true,
            'attachments'   => $attachmentsResponse
        ];

        return response()->json($response);
    }

    public function apiUpdateAttachment(HttpRequest $request)
    {
        $parameters = $request->route()->parameters();
        $attachment = $request->input('attachment');

        // check that is a attachment stored
        // lso we control the edit action is because,
        // when creating a new language id detects and assumes that the image is in the database
        if(isset($attachment['id']) && $request->input('action') == 'edit')
        {
            $width = null; $height= null;
            if($attachment['type']['id'] == 1)
            {
                list($width, $height) = getimagesize(public_path() . $attachment['folder'] . '/' . $attachment['fileName']);
            }

            Attachment::where('id_156', $attachment['id'])->where('lang_156', $parameters['lang'])->update([
                'family_156'            => $attachment['family'] == ""? null : $attachment['family'],
                'library_156'           => $attachment['library'],
                'library_file_name_156' => $attachment['libraryFileName'] == ""? null : $attachment['libraryFileName'],
                'sorting_156'           => $attachment['sorting'],
                'name_156'              => $attachment['name'] == ""? null : $attachment['name'],
                'file_name_156'         => $attachment['fileName'] == ""? null : $attachment['fileName'],
                'mime_156'              => $attachment['mime'],
                'size_156'              => filesize(public_path() . config('hotels.attachmentFolder') . '/' . $parameters['article'] . '/' . $parameters['lang'] . '/' . $attachment['fileName']),
                'type_156'              => $attachment['type']['id'],
                'type_text_156'         => $attachment['type']['name'],
                'width_156'             => $width,
                'height_156'            => $height
            ]);
        }

        $response = [
            'success'   => true,
            'message'   => "Attachment updated",
            'function'  => "apiUpdateAttachment"
        ];

        return response()->json($response);
    }

    public function apiUpdatesAttachment(HttpRequest $request)
    {
        $parameters = $request->route()->parameters();
        $attachments = $request->input('attachments');

        foreach($attachments as $attachment)
        {
            // check that is a attachment stored also we control is a edit action because,
            // when creating a new language id detects and assumes that the image is in the database
            if(isset($attachment['id']) && $request->input('action') == 'edit')
            {
                $width = null; $height= null;
                // attachment type 1 = image, 2 = file, 3 = video
                if($attachment['type']['id'] == 1)
                {
                    list($width, $height) = getimagesize(public_path() . $attachment['folder'] . '/' . $attachment['fileName']);
                }

                Attachment::where('id_156', $attachment['id'])->where('lang_156', $parameters['lang'])->update([
                    'family_156'            => $attachment['family'] == ""? null : $attachment['family'],
                    'library_156'           => $attachment['library'],
                    'library_file_name_156' => $attachment['libraryFileName'] == ""? null : $attachment['libraryFileName'],
                    'sorting_156'           => $attachment['sorting'],
                    'name_156'              => $attachment['name'] == ""? null : $attachment['name'],
                    'file_name_156'         => $attachment['fileName'] == ""? null : $attachment['fileName'],
                    'mime_156'              => $attachment['mime'],
                    'size_156'              => filesize(public_path() . config('hotels.attachmentFolder') . '/' . $parameters['article'] . '/' . $parameters['lang'] . '/' . $attachment['fileName']),
                    'type_156'              => $attachment['type']['id'],
                    'type_text_156'         => $attachment['type']['name'],
                    'width_156'             => $width,
                    'height_156'            => $height
                ]);
            }
        }

        $response = [
            'success'   => true,
            'message'   => "Attachments updated",
            'function'  => "apiUpdatesAttachment"
        ];

        return response()->json($response);
    }

    public function apiDeleteAttachment(HttpRequest $request)
    {
        $parameters = $request->route()->parameters();

        $attachment = Attachment::getTranslationRecord($parameters['id'], $parameters['lang']);

        if($attachment->file_name_156 != null && $attachment->file_name_156 != "")
        {
            File::delete(public_path() . config('hotels.attachmentFolder') . '/' . $attachment->hotel_156 . '/' . $attachment->lang_156 . '/' . $attachment->file_name_156);
        }

        Attachment::deleteTranslationRecord($parameters['id'], $parameters['lang']);

        $response = [
            'success'   => true,
            'message'   => "Attachment deleted",
            'function'  => "apiDeleteAttachment"
        ];

        return response()->json($response);
    }

    public function apiDeleteTmpAttachment(HttpRequest $request)
    {
        File::delete(public_path() . config('hotels.tmpFolder') . '/' . $request->input('fileName'));

        $response = [
            'success'   => true,
            'message'   => "Temp attachment deleted",
            'function'  => "apiDeleteTmpAttachment"
        ];

        return response()->json($response);
    }
}