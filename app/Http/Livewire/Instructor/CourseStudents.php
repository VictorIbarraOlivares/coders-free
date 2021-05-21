<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CourseStudents extends Component
{
    use WithPagination;

    public $course;
    public $search = "";

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        $students = $this->course->students()
        ->where('name', 'LIKE', "%{$this->search}%")
        ->orWhere('email', 'LIKE', "%{$this->search}%")
        ->paginate(2);
        return view('livewire.instructor.course-students', compact('students'))->layout('layouts.instructor');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
