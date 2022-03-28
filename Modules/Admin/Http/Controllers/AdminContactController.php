<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Contact;

class AdminContactController extends Controller
{
    public function index()
    {
    	$contacts = Contact::get();
    	$viewData = [
    		'contacts' => $contacts
    	];
        return view('admin::contact.index',$viewData);
    }

    public function action(Request $request, $action,$id)
    {
        if($action)
        {
            $contact =  Contact::find($id);
            switch ($action) {
                case 'status':
                	$contact->ct_status = $contact->ct_status == 1 ? 0 : 1;
                	$contact->save();
                	break;
            }
        }
        return redirect()->back();
    }

}
