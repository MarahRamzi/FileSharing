<?php

namespace App\Http\Controllers;

use App\Http\Requests\FileRequest;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FileController extends Controller
{
    public function create(File $file){
        return view('File.create' , compact('file'));
    }

//     public function store(Request $request)
//     {
//         // Validate the request data
//         $validate = $request->validate([
//             'title' => 'required|max:255',
//             'Description' => 'nullable|string|max:255',
//         ]);



//         // Check if the 'title' file was uploaded
//         if ($request->hasFile('title')) {
//             $titleFile = $request->file('title'); // Assign the uploaded file to a separate variable

//             $extension = $titleFile->getClientOriginalExtension();
//             $filename = pathinfo($titleFile->getClientOriginalName(), PATHINFO_FILENAME);

//             // Store the 'title' file with a specific path
//             $path = $titleFile->store('titles', 'uploads');

//             $fileLink = Storage::disk('uploads')->url($path); // Generate the link using the Storage facade
// //   Create a new File model and save it to the database
//            $file = File::create([
//                'title' => $filename, // Use the filename as the title
//                'description' => $request->input('Description'),
//                'file_path' => $path, // Store the file path in the database
//            ]);


//            // Make sure you pass all five required arguments
//            $userAgent = $_SERVER['HTTP_USER_AGENT']; // Get the user agent from the HTTP request headers
//            $ipAddress = $request->ip();


//            $response = Http::get("https://api.ipgeolocation.io/ipgeo?apiKey=YOUR_API_KEY&ip={$ipAddress}");
//            $data = $response->json();

//            // Check the response structure and access the correct key for the country
//            $country = $data['country_name'] ?? 'Unknown'; // Use a default value if the key is not found

//            // Define the $downloaded_at variable with the current timestamp
//            $downloaded_at = Carbon::now();

//                // Assuming you have $file defined
//         //    event(new FileDownloaded($file, $userAgent, $ipAddress, $country, $downloaded_at));


//             return view('Files.download')->with([
//                 'fileLink' => $fileLink,
//                 'fileName' => $filename, // Pass the filename to the view
//             ]) ->with('success','files upladed successfuuly');
//         }

//         else {
//             // Handle the case when no 'title' file is uploaded
//             // Redirect back with an error message or do other appropriate actions
//             return redirect()->back()->with('error', 'No title file was uploaded.');
//         }
//     }

    // public function downloadFile(Request $request, $fileId)
    // {
    //     // Find the file by its ID
    //     $file = File::find($fileId);

    //     if (!$file) {
    //         // Handle file not found (e.g., return an error response)
    //         return redirect()->back()
    //             ->with('msg', 'File not found')
    //             ->with('type', 'danger');
    //     }

    //     // Get the file's local path
    //     $filePath = Storage::disk('uploads')->path($file->file_path);

    //     // Get the original filename (base name)
    //     $originalFilename = pathinfo($filePath, PATHINFO_BASENAME);

    //     // Increment the total downloads count
    //     $file->total_downloads++;
    //     $file->save();

    //     // Return the file as a download with a custom name
    //     return response()->download($filePath, $originalFilename);
    // }
   public function store(FileRequest $request , File $file)
   {

    // $file= File::create($request->validated([
    //     'File'
    // ]));

    $request->validate([
        'File' => ['required' , 'file'],
    ]);

    if($file = $request->hasFile('File')){
        $file = $request->file('File');

        File::insert([
            'File' => $file->store('app/'. $file->File),
            'email' => $request->email,
            'title' => $request->title,
            'message' => $request->message
        ]);
        // $fileName = $file->getClientOriginalName();

        // $filePath = $file->storeAs('storage', $fileName);

        $filelink = Url::signedRoute('files.download',$file->id);
        // dd($filelink);

        // $request->merge(['File' => $fileName]);

        // dd($filelink);

        return view('File.link')->with([
            'filelink' => $filelink
        ])->with('success' , 'You have successfully upload file.');

    }else

    return redirect(route('files.create'))->with('error','You have not successfully upload file.');

   }




   public function downloadFile(File $file)
    {

        //get fileLink
        $path = request()->post('filelink');
        //check if the file exsist
        if($path && Storage::disk('local')->exists($path)){
            $file = Storage::disk('local')->path($path);
            return response()->download($file);
        }
            abort(404, 'File not found');
        $path = storage_path('storage/' . $file->fileName);

        return response()->download(storage_path('app/'.$file->File));



        }
    }

//    public function downloadFile($fileName)
//     {
//         $disk = 'storage';

//         if (Storage::disk($disk)->exists($fileName)) {
//             return Storage::download($fileName);
//         } else {
//             abort(404, 'File not found');
//         }
// /     }
