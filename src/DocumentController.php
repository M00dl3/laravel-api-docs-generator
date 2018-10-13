<?php
namespace Jurrid\Documentor;

use File;
use Exception;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    public function index()
    {
        throw_if(
            File::exists(public_path('vendor/documentor')) == false,
            Exception::class,
            'No documentation assets are published'
        );

        throw_if(
            File::exists(storage_path('documentor/data.ser')) == false,
            Exception::class,
            'No documentation is generated'
        );

        $docu = unserialize(
            file_get_contents(storage_path('documentor/data.ser'))
        );

        return view('docu::index', ['docu' => $docu]);
    }
}