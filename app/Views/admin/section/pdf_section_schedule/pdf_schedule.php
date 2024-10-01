<!DOCTYPE html>
<html>

<head>
    <title>Schedule</title>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
        border: 1px solid black;
    }

    th,
    td {
        border: 1px solid black;
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: maroon;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .hidden {
        display: none;
    }

    .na-cell {
        color: white;
    }

    td {
        vertical-align: middle;
    }

    td.subject,
    td.professor {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" style="font-family: poppins">
                <thead>
                    <tr>
                    <th style="width:auto;" id="button-room-student" colspan="<?= getColspanCount($schedule) ?>">
                            <?= $schedule[0]['strand'] . ' (ROOM - ' . $schedule[0]['room'] . ') ' ?>
                        </th>
                    </tr>
                    <tr>
                        <?php if (hasScheduleData($schedule, 'start_monday')) : ?>
                        <th>Monday</th>
                        <?php endif; ?>
                        <?php if (hasScheduleData($schedule, 'start_tuesday')) : ?>
                        <th>Tuesday</th>
                        <?php endif; ?>
                        <?php if (hasScheduleData($schedule, 'start_wednesday')) : ?>
                        <th>Wednesday</th>
                        <?php endif; ?>
                        <?php if (hasScheduleData($schedule, 'start_thursday')) : ?>
                        <th>Thursday</th>
                        <?php endif; ?>
                        <?php if (hasScheduleData($schedule, 'start_friday')) : ?>
                        <th>Friday</th>
                        <?php endif; ?>
                        <th>Course</th>
                        <th>Professor</th>
                    </tr>
                </thead>
                <tbody>
                            <?php 
                        $ids = array_combine(
                            explode(',', $schedule[0]['subject_id']),
                            array_map(function($sub, $teacher_id, $str_mon, $en_mon, $str_tue, $en_tue, $str_wed, $en_wed, $str_thu, $en_thu, $str_fri, $en_fri) use ($teacher, $subs) {
                                $teacher_name = '';
                                foreach ($teacher as $teachers) {
                                    if ($teachers['id'] == $teacher_id) {
                                        $teacher_name = $teachers['firstname'] . ' ' . $teachers['middlename'] . ' ' . $teachers['lastname'];
                                        break;
                                    }
                                }
                                $subss = '';
                                foreach ($subs as $subsss) {
                                    if ($subsss['id'] == $sub) {
                                        $subss = $subsss['subject'];
                                        break;
                                    }
                                }                                
                                return [
                                    'subss' => $subss,
                                    'teacher_name' => $teacher_name,
                                    'str_mon' => $str_mon,
                                    'en_mon' => $en_mon,
                                    'str_tue' => $str_tue,
                                    'en_tue' => $en_tue,
                                    'str_wed' => $str_wed,
                                    'en_wed' => $en_wed,
                                    'str_thu' => $str_thu,
                                    'en_thu' => $en_thu,
                                    'str_fri' => $str_fri,
                                    'en_fri' => $en_fri,
                                ];
                            }, 
                            explode(',', $schedule[0]['subject_id']),
                            explode(',', $schedule[0]['teacher_id']),
                            explode(',', $schedule[0]['start_monday']),
                            explode(',', $schedule[0]['end_monday']),
                            explode(',', $schedule[0]['start_tuesday']),
                            explode(',', $schedule[0]['end_tuesday']),
                            explode(',', $schedule[0]['start_wednesday']),
                            explode(',', $schedule[0]['end_wednesday']),
                            explode(',', $schedule[0]['start_thursday']),
                            explode(',', $schedule[0]['end_thursday']),
                            explode(',', $schedule[0]['start_friday']),
                            explode(',', $schedule[0]['end_friday'])
                        ));
                        
                        // Function para i-compare ang `str_mon` values
                        function compareStrMon($a, $b) {
                            $strMonA = strtotime($a['str_mon']);
                            $strMonB = strtotime($b['str_mon']);
                            
                            // Kung ang `str_mon` ay pareho, i-validate ang `str_tue`
                            if ($strMonA === $strMonB) {
                                $strTueA = strtotime($a['str_tue']);
                                $strTueB = strtotime($b['str_tue']);
                                
                                return $strTueA - $strTueB;
                            }
                            
                            return $strMonA - $strMonB;
                        }
                        
                        // I-sort ang `$ids` array gamit ang `compareStrMon` function
                        usort($ids, 'compareStrMon');
                        
                                                               
                        ?>

                            <?php foreach ($subs as $stdnt_sjct): ?>
                            <?php if (isset($ids[$stdnt_sjct['id']])): ?>
                            <?php if (hasNoData($ids[$stdnt_sjct['id']])) continue; ?>
                            <tr>
                                <?php if (isset($ids[$stdnt_sjct['id']]['str_mon']) && !empty($ids[$stdnt_sjct['id']]['str_mon']) && $ids[$stdnt_sjct['id']]['str_mon'] !== '06:00 PM' && $ids[$stdnt_sjct['id']]['en_mon'] !== '06:00 PM'): ?>
                                <td><?= formatTime($ids[$stdnt_sjct['id']]['str_mon']) . ' - ' . formatTime($ids[$stdnt_sjct['id']]['en_mon']); ?>
                                </td>
                                <?php endif; ?>
                                <?php if (isset($ids[$stdnt_sjct['id']]['str_tue']) && !empty($ids[$stdnt_sjct['id']]['str_tue']) && $ids[$stdnt_sjct['id']]['str_tue'] !== '06:00 PM' && $ids[$stdnt_sjct['id']]['en_tue'] !== '06:00 PM'): ?>
                                <td><?= formatTime($ids[$stdnt_sjct['id']]['str_tue']) . ' - ' . formatTime($ids[$stdnt_sjct['id']]['en_tue']); ?>
                                </td>
                                <?php endif; ?>
                                <?php if (isset($ids[$stdnt_sjct['id']]['str_wed']) && !empty($ids[$stdnt_sjct['id']]['str_wed']) && $ids[$stdnt_sjct['id']]['str_wed'] !== '06:00 PM' && $ids[$stdnt_sjct['id']]['en_wed'] !== '06:00 PM'): ?>
                                <td><?= formatTime($ids[$stdnt_sjct['id']]['str_wed']) . ' - ' . formatTime($ids[$stdnt_sjct['id']]['en_wed']); ?>
                                </td>
                                <?php endif; ?>
                                <?php if (isset($ids[$stdnt_sjct['id']]['str_thu']) && !empty($ids[$stdnt_sjct['id']]['str_thu']) && $ids[$stdnt_sjct['id']]['str_thu'] !== '06:00 PM' && $ids[$stdnt_sjct['id']]['en_thu'] !== '06:00 PM'): ?>
                                <td><?= formatTime($ids[$stdnt_sjct['id']]['str_thu']) . ' - ' . formatTime($ids[$stdnt_sjct['id']]['en_thu']); ?>
                                </td>
                                <?php endif; ?>
                                <?php if (isset($ids[$stdnt_sjct['id']]['str_fri']) && !empty($ids[$stdnt_sjct['id']]['str_fri']) && $ids[$stdnt_sjct['id']]['str_fri'] !== '06:00 PM' && $ids[$stdnt_sjct['id']]['en_fri'] !== '06:00 PM'): ?>
                                <td><?= formatTime($ids[$stdnt_sjct['id']]['str_fri']) . ' - ' . formatTime($ids[$stdnt_sjct['id']]['en_fri']); ?>
                                </td>
                                <?php endif; ?>
                                <td><?= $ids[$stdnt_sjct['id']]['subss']; ?></td>
                                <td><?= $ids[$stdnt_sjct['id']]['teacher_name']; ?></td>
                            </tr>

                            <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
            </table>
            <br><br>

            <?php
$ids = array_combine(
    explode(',', $schedule[0]['subject_id']),
    array_map(function ($sub, $teacher_id, $str_sat, $en_sat) use ($teacher, $subs) {
        $teacher_name = '';
        foreach ($teacher as $teachers) {
            if ($teachers['id'] == $teacher_id) {
                $teacher_name = $teachers['firstname'] . ' ' . $teachers['middlename'] . ' ' . $teachers['lastname'];
                break;
            }
        }
        $subss = '';
        foreach ($subs as $subsss) {
            if ($subsss['id'] == $sub) {
                $subss = $subsss['subject'];
                break;
            }
        }
        return [
            'subss' => $subss,
            'teacher_name' => $teacher_name,
            'str_sat' => $str_sat,
            'en_sat' => $en_sat,
        ];
    },
        explode(',', $schedule[0]['subject_id']),
        explode(',', $schedule[0]['teacher_id']),
        explode(',', $schedule[0]['start_saturday']),
        explode(',', $schedule[0]['end_saturday']),
    ));

// Function para i-compare ang `str_mon` values
function compareStrSat($a, $b)
{
    return strtotime($a['str_sat']) - strtotime($b['str_sat']);
}

// I-sort ang `$ids` array gamit ang `compareStrMon` function
usort($ids, 'compareStrSat');

$schedulesExist = false;

foreach ($subs as $stdnt_sjct) {
    if (isset($ids[$stdnt_sjct['id']])) {
        $data = $ids[$stdnt_sjct['id']];
        if (empty($data['str_sat']) && empty($data['en_sat'])) continue;
        if (!$schedulesExist) {
            $schedulesExist = true;
            echo '<table id="" class="table table-bordered table-striped" style="font-family: poppins">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Saturday</th>';
            echo '<th>Course</th>';
            echo '<th>Professor</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
        }
        echo '<tr>';
        echo '<td>' . formatTime($data['str_sat']) . ' - ' . formatTime($data['en_sat']) . '</td>';
        echo '<td>' . $ids[$stdnt_sjct['id']]['subss'] . '</td>';
        echo '<td>' . $data['teacher_name'] . '</td>';
        echo '</tr>';
    }
}

if ($schedulesExist) {
    echo '</tbody>';
    echo '</table>';
}
?>



        </div>
    </div>

    <?php
function formatTime($time)
{
    $timeArray = explode(',', $time); // Convert the comma-separated string to an array
    sort($timeArray); // Sort the time values in ascending order
    
    $formattedTimes = [];
    foreach ($timeArray as $times) {
        $formattedTimes = date('h:i A', strtotime($times));
    }
    return date('h:i A', strtotime($formattedTimes));

}

function hasScheduleData($data, $day)
{
    foreach ($data as $entry) {
        if (!empty($entry[$day]) && strpos($entry[$day], ',')) {
            return true;
        }
    }
    return false;
}


function hasNoData($data)
{
    $days = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
    foreach ($days as $day) {
        if (!empty($data['str_' . $day]) && $data['str_' . $day] !== '06:00 PM' && $data['en_' . $day] !== '06:00 PM') {
            return false;
        }
    }
    return true;
}
function getColspanCount($schedule) {
    $colspan = 0;

    if (hasScheduleData($schedule, 'start_monday')) {
        $colspan++;
    }
    if (hasScheduleData($schedule, 'start_tuesday')) {
        $colspan++;
    }
    if (hasScheduleData($schedule, 'start_wednesday')) {
        $colspan++;
    }
    if (hasScheduleData($schedule, 'start_thursday')) {
        $colspan++;
    }
    if (hasScheduleData($schedule, 'start_friday')) {
        $colspan++;
    }

    // Add extra colspan for Subject and Professor columns
    $colspan += 2;

    return $colspan;
}

?>
</body>

</html>