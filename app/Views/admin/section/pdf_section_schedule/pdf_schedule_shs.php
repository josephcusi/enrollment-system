<!DOCTYPE html>
<html>

<head>
    <title>scheduleule</title>
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
        <table id="example1" class="table table-bordered table" style="font-family:poppins">
                                    <thead>
                                        <div style="font-family: 'Poppins';">
                                            
    
    </div>

                                        <tr>
                                            <th>Monday</th>
                                            <th>Tuesday</th>
                                            <th>Wednesday</th>
                                            <th>Thursday</th>
                                            <th>Friday</th>
                                            <th>Subject</th>
                                            <th>Profesor</th>
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
                            
                        ?>

                                        <?php foreach($subs as $stdnt_sjct): ?>
                                        <?php if(isset($ids[$stdnt_sjct['id']])): ?>
                                        <tr>
                                            <td><?= $ids[$stdnt_sjct['id']]['str_mon']; ?> -
                                                <?= $ids[$stdnt_sjct['id']]['en_mon']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['str_tue']; ?> -
                                                <?= $ids[$stdnt_sjct['id']]['en_tue']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['str_wed']; ?> -
                                                <?= $ids[$stdnt_sjct['id']]['en_wed']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['str_thu']; ?> -
                                                <?= $ids[$stdnt_sjct['id']]['en_thu']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['str_fri']; ?> -
                                                <?= $ids[$stdnt_sjct['id']]['en_fri']; ?></td>
                                                <td><?= $ids[$stdnt_sjct['id']]['subss']; ?></td>
                                            <td><?= $ids[$stdnt_sjct['id']]['teacher_name']; ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>



                                    </tbody>
                                </table>
            <br><br>

        </div>
    </div>

</body>

</html>