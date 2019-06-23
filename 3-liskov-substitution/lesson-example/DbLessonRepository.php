<?php namespace LessonExample;

class DbLessonRepository implements LessonRepositoryInterface
{

    public function getAll()
    {
        // Get lessons using an eloquent model
        return Lesson::all(); // Violates the LSP - This is returning a collection object, not an array

        // return Lesson:all()->toArray(); - this would fix this for us.
    }

}