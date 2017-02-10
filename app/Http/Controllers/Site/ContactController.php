<?php

namespace Doctor\Http\Controllers\Site;

use Doctor\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctor\Http\Requests\ContactRequest;
use SEO;

class ContactController extends Controller
{
    public function index()
    {
        SEO::setTitle('Contato');
        SEO::opengraph()->setUrl( url()->current() );
        SEO::setCanonical( url()->current() );
        SEO::opengraph()->addProperty('type', 'articles');

        return view('layout.pages.contact');
    }

    public function store(ContactRequest $request)
    {
        $email = $request->get('email');
        \Mail::send('emails.contact',
            [
                'name' => $request->get('name'),
                'email' => $email,
                'user_message' => $request->get('message'),
                'subject' => 'Formulário de Contato do Site'
            ], function($message) use($email)
        {
            $message->from($email);
            $message->subject('Formulário de Contato do Site');
        });

        return redirect()->route('contact')->with('message', 'Obrigado por nos contatar.');
    }
}
