<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use app\Http\Livewire\Modal;

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

    public function admin()
    {   
        $categories = Category::all();
        $contacts = Contact::paginate(7);
        $sum = 0;
        return view('admin', compact('categories','contacts','sum'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $query = Contact::query();
        if ($value = $request->keyword) {
            $query->where('first_name', 'like', "%{$value}%")
            ->orWhere('last_name', 'like', "%{$value}%")
            ->orWhere('email', 'like', "%{$value}%");
        }
        if ($value = $request->gender) {
            $query->where('gender', 'like', "%{$value}%");
        }
        if ($value = $request->category_id) {
            $query->where('category_id', 'like', "%{$value}%");
        }
        if ($value = $request->date) {
            $query->where('created_at', 'like', "%{$value}%");
        }
        $contacts = $query->paginate(7)->withQueryString();
        $sum = 0;
        return view('admin', compact( 'categories', 'contacts','sum'));
    }
    
    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/admin')->with('message', 'お問い合わせを削除しました');
    }

    public function login(Request $request)
    {
        return view('/login');
    }

    public function register(Request $request)
    {
        return  view('/register');
    }
}