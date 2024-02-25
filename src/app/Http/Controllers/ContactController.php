<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        // return redirect('/');
        $categories = Category::all();
        return view('index', compact('categories'));
    }



    public function confirm(ContactRequest $request)
    {
        
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email', 
            'tell1', 
            'tell2',
            'tell3',
            'address',
            'building',
            'category_id',
            'detail',
            ]);
        $tell = $contact['tell1'] . $contact['tell2'] . $contact['tell3'];
        $tell_backup = [$contact['tell1'] , $contact['tell2'] , $contact['tell3']];

        $categories = Category::all();
        return view('confirm', compact('contact', 'categories', 'tell', 'tell_backup'));
    }


    public function store(Request $request)
    {
        if($request->input('edit') == 'edit'){
            
            return redirect('/')->withInput();
        } 
        else 
        {
            $contact = $request->only([
                'first_name',
                'last_name',
                'gender',
                'email',
                'tell',
                'address',
                'building',
                'category_id',
                'detail',
            ]);
            Contact::create($contact);
            return view('thanks');
        }

        
    }
}