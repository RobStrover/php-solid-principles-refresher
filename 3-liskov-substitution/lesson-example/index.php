<?php namespace LessonExample;

function foo(LessonRepositoryInterface $lesson)
{
    $lessons = $lesson->getAll();
}