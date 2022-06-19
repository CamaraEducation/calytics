<?php

class PortalApi{
    public static function init($data){
        $data = json_decode($data, true);
        $content = $data['content'];
        $general = $data['general'];
        
        foreach($content as $key => $data){
            $sid = self::sc_check($data);
            self::content(
                $sid,
                $data['title'],
                $data['type'],
                $data['class'],
                $data['age'],
                $data['role'],
                $data['created']
            );            
        }

        foreach($general as $key => $data){
            $sid = self::sc_check($data);
            self::general(
                $sid,
                $data['uri'],
                $data['identifier'],
                $data['class'],
                $data['age'],
                $data['role'],
                $data['time'],
                $data['created']
            );            
        }
    }

    public static function sc_check($data){
        $school = $data['school'];
        $region = $data['region'];

        $sql = "SELECT id FROM schools WHERE sc_name = '$school' AND sc_region = '$region'";
        $res = mysqli_query(conn(), $sql);

        if(mysqli_num_rows($res) > 0){
            $res = mysqli_fetch_assoc($res);
        }else{
            $res = self::sc_add(
                $school,
                $data['category'],
                $data['ownership'],
                $region,
                $$data['country'],
            );
        }

        return $res['id'];
    }

    public static function sc_add($name, $level, $owner, $region, $country){
        $sql = "INSERT INTO schools VALUE (DEFAULT, '$name', '$level', '$owner', '$region', '$country', DEFAULT, DEFAULT)";
        if(mysqli_query(conn(), $sql)){
            return self::sc_check(['schoo'=>$name, 'region'=>$region]);
        }
    }

    public static function content($sid, $title, $type, $class, $age, $role, $created){
        
    }

    public static function general($sid, $uri, $identifier, $class, $age, $role, $live, $created){
        
    }
}