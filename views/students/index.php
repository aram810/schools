<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
        }
    </style>
</head>
<body>
<?php
    if (!is_null($status) && !is_null($errors)) {
        if ($status === true) {
            echo 'Status: Success';
        } else {
            echo 'Status: Fail' . '<br />';
            foreach ($errors as $value) {
                echo $value . '<br />';
            }
        }
    }
?>
<h1>test</h1>

<table style="width:30%">
    <thead>
        <tr>
            <th colspan="10">
                <a href="/students/create">Create a new student here!</a>
            </th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Birthday</th>
            <th>Email</th>
            <th>Sex</th>
        </tr>
    </thead>
    <tbody>

    <?php  foreach ($studentsList as $key => $student) : ?>
        <tr>
            <td><?= $student->getFirstname(); ?></td>
            <td><?= $student->getLastname(); ?></td>
            <td><?= $student->getAge(); ?></td>
            <td><?= $student->getBirthday(); ?></td>
            <td><?= $student->getEmail(); ?></td>
            <td><?= $student->getSex(); ?></td>
            <td><?= '<a href="update/' . $student->getId() . '">Update</a>' ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
