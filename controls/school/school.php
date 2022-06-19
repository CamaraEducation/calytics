<?php
class SchoolController{
    public static function get($id){
        $sql = "SELECT * FROM schools WHERE id = '$id'";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
        return $res;
    }
    
    public static function search_id(){
        $name = mysqli_real_escape_string(conn(), $_POST['school']);
        $region = mysqli_real_escape_string(conn(), $_POST['region']);
        $country = mysqli_real_escape_string(conn(), $_POST['country']);

        $sql = "SELECT id FROM schools WHERE sc_name='$name' AND sc_region = '$region' AND sc_country = '$country'";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
        echo $res['id'];
    }

    public static function search_field(){
        $name = mysqli_real_escape_string(conn(), $_POST['school']);
        $region = mysqli_real_escape_string(conn(), $_POST['region']);
        $country = mysqli_real_escape_string(conn(), $_POST['country']);

        $sql = "SELECT sc_name FROM schools WHERE sc_name LIKE '%$name%' AND sc_region = '$region' AND sc_country = '$country' LIMIT 10";
        $res =  mysqli_fetch_all(mysqli_query(conn(), $sql), MYSQLI_ASSOC);
        foreach($res as $r){
            echo "<option value='".$r['sc_name']."'>";
        }
    }

    public static function name($id){
        $sql = "SELECT sc_name FROM schools WHERE id = '$id'";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
        return $res['sc_name'];
    }

    public static function sc_count($country = ''){
        $sql = "SELECT count(id) as total FROM schools WHERE sc_country LIKE '%$country%'";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
        echo $res['total'];
    }

    //fetch all school
    public static function fetch_all(){
        $sql = "SELECT * FROM schools";
        $res = mysqli_fetch_all(mysqli_query(conn(), $sql), MYSQLI_ASSOC);
        return $res;
    }

    public static function create(){
        # post data country, region, level, ownership, name
        # db-table:schools | cols: sc_country, sc_region, sc_level, sc_ownership, sc_name
        foreach($_POST as $key=>$value){
            if(is_array($value)){  $value = implode(',', $value);}
            $$key = mysqli_real_escape_string(conn(), $value);
        }

        # check if school exists
        $sql = "SELECT * FROM schools WHERE sc_name = '$school' AND sc_region = '$region' AND sc_country = '$country'";
        if(mysqli_num_rows(mysqli_query(conn(), $sql)) > 0){
            echo "School already exists";
        }else{
            $sql = "INSERT INTO schools (sc_country, sc_region, sc_level, sc_ownership, sc_name) VALUES ('$country', '$region', '$level', '$type', '$school')";

            if(mysqli_query(conn(), $sql)){
                echo "success";
            }else{
                echo "Unknown Error Occured";
            }
        }
    }

}

?>