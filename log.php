<?php
//echo $_GET['task'];

$json = file_get_contents('data.json');
$data = json_decode($json,true);
date_default_timezone_set('Europe/Riga');
if (is_array($data)) {
    krsort($data);
}

switch ($_GET['mode']){

    case 'remove':
        $id = $_GET['id'];
        $data[$id]['status']= 0;
        $json = json_encode($data);
        $file = fopen('data.json','w');
        fwrite($file,$json);
    break;

    case 'status':
        $id = $_GET['id'];
        $data[$id]['status']= 1;
        $json = json_encode($data);
        $file = fopen('data.json','w');
        fwrite($file,$json);
        break;

    case 'stop':
        $id = $_GET['id'];
        if (empty($data[$id]['date_ended'])){
        $data[$id]['date_ended']= time();
        $json = json_encode($data);
        $file = fopen('data.json','w');
        fwrite($file,$json);}
    break;

    case 'new':

        $time = time();
        $data[$time]['id'] = $time;
        $data[$time]['date_created'] = $time;
        $data[$time]['date_ended'] = '';
        $data[$time]['status'] = 1;
        $data[$time]['name'] = $_GET['task'];
        $json = json_encode($data);
        $file = fopen('data.json','w');
        fwrite($file,$json);
    break;


    case 'tally':
        $count = 0;
        if (is_array($data)) {
        foreach ($data as $task){
            if (!empty( $task['date_ended'])){
            $count = $count + $task["date_ended"] - $task['date_created']; }
        } }
    echo round($count/3600, 2) . ' hrs';
    break;

    case 'build':
        if (is_array($data)) {
    foreach ($data as $task){
        if ($task['status'] == 1){
        ?>
    <tr>
        <td><?php echo $task['name'] ?></td>
        <td><?php echo date('M j Y h:i A',$task['date_created']) ?></td>
        <td><?php if (!empty($task['date_ended'])){
                echo date('M j Y h:i A',$task['date_ended']);
            } ?></td>
        <td><?php if (empty($task['date_ended'])){
            echo round((time() - $task['date_created'])/60) . ' minutes';
            } else {echo round(($task["date_ended"] - $task['date_created'])/60) . ' minutes';} ?></td>
        <td class="btn-col"><button data-id="<?php echo $task['id'] ?>" class="btn btn-primary btn-stop" <?php if (!empty($task['date_ended'])){echo 'disabled';} ?>>Stop</button></td>
        <td class="btn-col"><button data-id="<?php echo $task['id'] ?>" class="btn btn-secondary btn-remove">Hide</button></td>
    </tr>


<?php
        }
    }}
break;
    case 'restore':
        if (is_array($data)) {
        foreach ($data as $task){
            if ($task['status'] == 0){
                ?>
                <tr>
                    <td><?php echo $task['name'] ?></td>
                    <td><?php echo date('M j Y h:i A',$task['date_created']) ?></td>
                    <td><?php if (!empty($task['date_ended'])){
                            echo date('M j Y h:i A',$task['date_ended']);
                        } ?></td>
                    <td><?php if (empty($task['date_ended'])){
                            echo round((time() - $task['date_created'])/60) . ' minutes';
                        } else {echo round(($task["date_ended"] - $task['date_created'])/60) . ' minutes';} ?></td>
                    <td class="btn-col"></td>
                    <td class="btn-col"><button data-id="<?php echo $task['id'] ?>" class="btn btn-info btn-restore">Restore</button></td>
                </tr>


                <?php
            }
        }}
        break;

}
?>