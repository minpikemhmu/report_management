<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mime\Part\Multipart\AlternativePart;
use Symfony\Component\Mime\Part\TextPart;
use Illuminate\Support\Facades\Storage;



class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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

    public function showEmailForm()
    {
        return view('emails.email');
    }

    public function previewEmail(SendEmailRequest $request)
    {
        $validatedData = $request->validated();


        $emails = explode(',', $validatedData['email']);
        $ccEmails = explode(',', $validatedData['cc']);
        $bccEmails = explode(',', $validatedData['bcc']);
        $attachments = $request->file('attachments');
        $body = $validatedData['body'];
        $subject = $validatedData['subject'];
        $htmlBody = Markdown::parse($body);

        return view('emails.orders');

        return view('emails.email-preview', compact('emails', 'ccEmails', 'bccEmails', 'attachments', 'subject', 'body', 'htmlBody'));
    }

    public function confirmSendEmail(SendEmailRequest $request)
    {
        // Perform the actual sending of the email
        $validatedData = $request->validated();

        $emails = explode(',', $validatedData['email']);
        $ccEmails = explode(',', $validatedData['cc']);
        $bccEmails = explode(',', $validatedData['bcc']);

        // changing attachments form for auto attach to email
        $attachments = [];
        $paths = [];
        foreach ($request->file('attachments') as $attachment) {
            // Assuming you want to store the uploaded file in a specific directory
            $paths[] = $attachment->store('attachments');

            $arr = [
                'file' => $attachment->getRealPath(),
                'options' => [

                    'as' => $attachment->getClientOriginalName(),
                    'mime' => $attachment->getClientMimeType(),
                ]
            ];
            $attachments[] = $arr;
        }


        $body = $validatedData['body'];
        $subject = $validatedData['subject'];

        $htmlBody = $body ? Markdown::parse($body) : '';

        // Create the text and HTML versions of the email
        $textContent = new TextPart(strip_tags($htmlBody));
        $htmlContent = new TextPart($htmlBody ? $htmlBody->toHtml() : '');

        // Create the multipart/alternative part to handle both versions
        $alternativePart = new AlternativePart($textContent, $htmlContent);

        Mail::to($emails)->send(new SendEmail($ccEmails, $bccEmails, $subject, $alternativePart, $attachments, $body));


        // Delete the file store in Storage/app/attachments
        foreach ($paths as $path) {

            if (Storage::exists($path)) {
                Storage::delete($path);
            }
        }

        return redirect()->route('email.form')->with('success', 'Email was sent successfully.');
    }

    public function showPhpInfo() 
    {
        return view('emails.php-info');
    }
}
