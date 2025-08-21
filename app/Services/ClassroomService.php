<?php

namespace App\Services;

use App\Models\Classroom;

class ClassroomService
{
    /**
     * Get all classrooms.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Classroom::all();
    }

    /**
     * Get a single classroom by ID.
     *
     * @param  int  $id
     * @return Classroom|null
     */
    public function getById($id)
    {
        return Classroom::findOrFail($id);
    }

    /**
     * Create a new classroom.
     *
     * @param  array  $data
     * @return Classroom
     */
    public function create(array $data)
    {
        return Classroom::create([
            'name' => $data['name'],
        ]);
    }

    /**
     * Update an existing classroom.
     *
     * @param  array  $data
     * @param  int    $id
     * @return Classroom
     */
    public function update(array $data, $id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->update([
            'name' => $data['name'],
        ]);

        return $classroom;
    }

    /**
     * Delete a classroom.
     *
     * @param  int  $id
     * @return bool|null
     */
    public function delete($id)
    {
        $classroom = Classroom::findOrFail($id);
        return $classroom->delete();
    }
}
