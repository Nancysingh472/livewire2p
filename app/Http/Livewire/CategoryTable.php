<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\fcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\DbCommand;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;
    public $search='';

   

   
    
   
    public function render()
    {
       
        $users = DB::table('fcategories')->where('category', 'like', '%'.$this->search.'%')->paginate(4);
       
        return view('livewire.category-table',compact('users'));
    }
}
