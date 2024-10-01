<?php
namespace App\Models;

use CodeIgniter\Model;

class DeadlineModel extends Model
{
    protected $table = 'deadlines'; // Replace 'deadlines' with the name of your table
    protected $primaryKey = 'id'; // Replace 'id' with the primary key column name

    protected $allowedFields = ['deadline_date','deadline_datetime', 'end_date','end_datetime']; // Replace with the columns you want to allow for mass assignment

    // Add other model configurations if needed
   public function saveDeadline($deadlineDate, $deadlineTime, $endDate, $endTime)
{
    // Combine the date and time strings to create the datetime value
    $deadlineDatetime = $deadlineDate . ' ' . $deadlineTime;
    $endDatetime = $endDate . ' ' . $endTime;

    $data = [
        'deadline_date' => $deadlineDate,
        'deadline_datetime' => $deadlineDatetime,
        'end_date' => $endDate,
        'end_datetime' => $endDatetime, // Fixed variable name
    ];

    $this->insert($data);
}
public function getLatestDeadline()
{
    $query = $this->select('deadline_datetime, end_datetime')
        ->orderBy('id', 'desc')
        ->limit(1)
        ->get();

    if ($query->getNumRows() > 0) {
        $result = $query->getRowArray();
        return [
            'deadline_datetime' => $result['deadline_datetime'],
            'end_datetime' => $result['end_datetime']
        ];
    }

    return null; // No results found
}
public function deleteAllData()
    {
        // Build the custom delete query to delete all data
        $sql = 'DELETE FROM ' . $this->table;

        // Execute the delete query
        $this->db->query($sql);
    }
}