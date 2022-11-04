<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\ListItem;

class TodoListController extends Controller
{

    public function index(){

        return view('welcome',['userItems' => ListItem::where('is_complete',0)->get()]);
    }

    public function markComplete($id){

        $newListItem = ListItem::find($id);
        $newListItem -> is_complete = 1;
        $newListItem -> save();

        return redirect('/');

    }


    public function saveItem(Request $request){
        
        $newListItem = new ListItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();

        return redirect ('/');
    }
}
