<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class InstructorCourses extends Component
{
    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $courses = Course::where('title', 'LIKE', "%{$this->search}%")
        ->where('user_id', auth()->user()->id )->paginate(8);
        return view('livewire.instructor-courses', ['courses' => $courses]);
    }
}
