<?php

namespace App\Http\Controllers;

use App\Models\PatientReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class OnlyOfficeController extends Controller
{
    public function openDocument($id)
    {
        $document = PatientReport::findOrFail($id);

        // Generate the URL to the document using the 'documents.show' route
        $documentUrl = route('documents.show', $document->id);
        // $documentUrl = Storage::url('patientReports/' . $document->file_name);
        // $documentUrl = "http://localhost:8001/storage/patientReports/Fahim.Docx";
        // dd($documentUrl);
        $config = [
            "document" => [
                "fileType" => "docx", // Extract the file type
                "key" => uniqid(), // Unique identifier for the document
                "title" => $document->file_name,
                "url" => $documentUrl,
            ],
            "editorConfig" => [
                "callbackUrl" => route('onlyoffice.callback', $document->id),
                "permissions" => [
                    "edit" => true,
                    "download" => true,
                    "print" => true,
                    "read" => true,
                    "comment" => true,
                    "fillForms" => true,
                    "modifyFilter" => true,
                    "modifyContentControl" => true,
                    "review" => true,
                    // Add other permissions as needed
                ], // The callback URL after editing
            ],
        ];
        // Log the configuration array
        Log::info('ONLYOFFICE Editor Config:', $config);

        return view('onlyoffice.editor', compact('config'));
    }


    public function callback(Request $request, $id)
    {
        // Handle ONLYOFFICE callback
    }
}