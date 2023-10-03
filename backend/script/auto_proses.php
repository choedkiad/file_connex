<?php
include "../config.php";


$query_project = mysqli_query($conn,"SELECT * FROM type_project WHERE project_id ='$_GET[project]'");
$rs_project = mysqli_fetch_array($query_project);
$data = array('project_type' => $rs_project['project_type'],
	            'project_alley' => $rs_project['project_alley'],
              'project_alley_en' => $rs_project['project_alley_en'],
	            'project_road' => $rs_project['project_road'],
              'project_road_en' => $rs_project['project_road_en'],
              'project_name' => $rs_project['project_name'],
              'project_name_en' => $rs_project['project_name_en'],
              'project_subdistrict' => $rs_project['project_subdistrict'],
              'project_district' => $rs_project['project_district'],
              'project_province' => $rs_project['project_province'],
              'project_train_station' => $rs_project['project_train_station'],
              'project_number_buildings' => $rs_project['project_number_buildings'],
              'project_map' => $rs_project['project_map'],
              'zone_id_project' => $rs_project['zone_id'],
              'project_view' => $rs_project['project_view'],
              'project_total_floors' => $rs_project['project_total_floors'],
              'project_facilities' => $rs_project['project_facilities'],
              'project_nearby_places' => $rs_project['project_nearby_places'],
              'project_facilities_en' => $rs_project['project_facilities_en'],
              'project_nearby_places_en' => $rs_project['project_nearby_places_en'],
              'project_zone' => $rs_project['project_zone']
	          );
      echo json_encode($data);


 ?>