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

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request as HttpRequest;
use Syscover\Pulsar\Controllers\Controller;
use Syscover\Pulsar\Traits\TraitController;
use Syscover\Hotels\Models\Library;

class LibraryController extends Controller {

    use TraitController;

    protected $routeSuffix  = 'HotelsLibrary';
    protected $folder       = 'library';
    protected $package      = 'hotels';
    protected $aColumns     = ['id_154', ['type' => 'library_img', 'data' => 'file_name_154'], 'file_name_154', ['type' => 'size', 'data' => 'size_154'], 'mime_154', 'type_text_154'];
    protected $nameM        = 'file_154';
    protected $model        = '\Syscover\Hotels\Models\Library';
    protected $icon         = 'fa fa-book';
    protected $objectTrans  = 'library';
    protected $jsonParam    = ['edit' => false];

    public function customColumnType($row, $aColumn, $aObject, $request)
    {
        switch ($aColumn['type'])
        {
            case 'library_img':
                if($aObject['type_154'] == 1)
                {
                    $row[] = '<img src="' . asset(config('hotels.libraryFolder') . '/' . $aObject['file_name_154']) . '" class="image-index-list">';
                }
                else
                {
                    $data = json_decode($aObject['data_154']);
                    $row[] = '<img src="' . asset(config('hotels.iconsFolder') . '/' . $data->icon) . '" class="image-index-list">';
                }

                break;
            case 'size':
                $row[] = number_format($aObject['size_154'] / 1048576, 2) . ' Mb';
                break;
        }

        return $row;
    }


    public function storeLibrary(HttpRequest $request)
    {
        $parameters         = $request->route()->parameters();
        $files              = $request->input('files');
        $objects            = [];
        $objectsResponse    = [];
        $filesNames         = [];

        foreach($files as $file)
        {
            File::copy(public_path() . config('hotels.libraryFolder') . '/' . $file['name'], public_path() . config('hotels.tmpFolder') . '/' . $file['name']);

            $width = null; $height= null;
            if($file['isImage'] == 'true')
            {
                list($width, $height) = getimagesize(public_path() . config('hotels.libraryFolder') . '/' . $file['name']);
            }

            $type = $this->getType($file['mime']);

            $objects[] = [
                'file_name_154' => $file['name'],
                'mime_154'      => $file['mime'],
                'size_154'      => $file['size'],
                'type_154'      => $type['id'],
                'type_text_154' => $type['name'],
                'width_154'     => $width,
                'height_154'    => $height,
                'data_154'      => json_encode(['icon' => $type['icon']])
            ];

            if($file['name'] != null && $file['name'] != "")
            {
                $filesNames[] = $file['name'];
            }

            // convert format getFile to format hotels application
            $objectsResponse[] = [
                'id'        => null,
                'family'    => null,
                'type'      => $type,
                'mime'      => $file['mime'],
                'name'      => null,
                'folder'    => config('hotels.tmpFolder'),
                'fileName'  => $file['name'],
                'width'     => $width,
                'height'    => $height
            ];
        }

        Library::insert($objects);

        $lastLibraryInsert = Library::whereIn('file_name_154', $filesNames)->get();

        foreach($lastLibraryInsert as $library)
        {
            foreach($objectsResponse as &$objectResponse)
            {
                if($library->file_name_154 == $objectResponse['fileName'])
                {
                    $objectResponse['library']          = $library->id_154;
                    $objectResponse['libraryFileName']  = $library->file_name_154;
                }
            }
        }

        $response = [
            'success' => true,
            'files'   => $objectsResponse
        ];

        return response()->json($response);
    }

    public function deleteCustomRecord($object)
    {
        File::delete(public_path() . config('hotels.libraryFolder') . '/' . $object->file_name_154);
    }

    public function deleteCustomRecords($ids)
    {
        $files      = Library::whereIn('id_154', $ids)->get();
        $fileNames  = [];

        foreach($files as $file)
        {
            $fileNames[] = public_path() . config('hotels.libraryFolder') . '/' . $file->file_name_154;
        }

        File::delete($fileNames);
    }

    private function getType($mime)
    {
        switch ($mime) {
            case 'image/gif':
            case 'image/jpeg':
            case 'image/pjpeg':
            case 'image/jpeg':
            case 'image/pjpeg':
            case 'image/png':
            case 'image/svg+xml':
                return [ 'id' => 1, 'name' => trans_choice('pulsar::pulsar.image', 1), 'icon' => 'icon_Generic.png'];
                break;
            case 'text/plain':
            case 'application/msword':
                return [ 'id' => 2, 'name' => trans_choice('pulsar::pulsar.file', 1), 'icon' => 'icon_DOCX.png'];
                break;
            case 'application/x-pdf':
            case 'application/pdf':
                return [ 'id' => 2, 'name' => trans_choice('pulsar::pulsar.file', 1), 'icon' => 'icon_PDF.png'];
                break;
            case 'video/avi':
            case 'video/mpeg':
            case 'video/quicktime':
            case 'video/mp4':
                return [ 'id' => 3, 'name' => trans_choice('pulsar::pulsar.video', 1), 'icon' => 'icon_Generic.png'];
                break;
            default:
                return null;
        }
    }
}