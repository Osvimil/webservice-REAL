<?php
include 'conexion.php';

$id = isset($_GET['status'])==true?$_GET['status']:"";
$type = isset($_GET['type'])==true?$_GET['type']:"";

if((!empty($id)) AND (!empty($type))) {
  $getData = "SELECT node.nid AS nid, field_data_field_image.field_image_fid, node.title AS node_title, node.language AS node_language,file_managed.uri,
             field_data_field_link.field_link_url,
             node.created AS node_created,
             'node' AS field_data_event_calendar_date_node_entity_type,
             'node' AS field_data_body_node_entity_type
            FROM node
            LEFT JOIN field_data_field_image ON node.nid = field_data_field_image.entity_id
            LEFT JOIN file_managed ON field_data_field_image.field_image_fid = file_managed.fid
            LEFT JOIN field_data_field_link ON node.nid = field_data_field_link.entity_id
           WHERE (( (node.status = '1') )AND(( (node.type IN  ('event_calendar')) )))";
  $qur = mysqli_query($conexion,$getData);

  while($r = mysqli_fetch_assoc($qur)){

  $msg[] = array("nid" => $r['nid'], "field_image_fid" => $r['field_image_fid'], "title" => $r['title'],"language" => $r['language'],"uri" => $r['uri'],"field_link_url" => $r['field_link_url'],"created" => $r['created']);
  }
  $json = $msg;

  header('content-type: application/json');
  echo json_encode($json);
}



@mysqli_close($conn);

?>
