<?php 

namespace project;

// require __DIR__ . '/../vendor/autoload.php'; 

class lead{



    function write_to_waypoint($lead, $business){

        $param_string = "";
        foreach($lead as $key => $value){ 
            $param = $key;
            if($key == "name"){ $param = "fullname"; }
            $param_string = $param_string . "&".$param ."=". $value;
        }
 
        foreach($business as $key => $value){ 
            $param = $key; 
            $param_string = $param_string . "&".$param ."=". $value;
        }
 
        $ch = curl_init();  
        
        $url = "https://opop.waypointsoftware.io/capture.php?xAuthentication=be9bf09f2a0a40c850452d4d3c4bc0b9" . $param_string; 
        // echo $url;
        curl_setopt($ch, CURLOPT_URL, $url);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $waypoint_response = curl_exec($ch);
        curl_close($ch);  
        
        return $waypoint_response;  
        die();
    }





    public function enquiry_data($enquiry_id, $company, $industry, $location, $role, $salary){
        $db = new db;
        $stmt = $db->db->prepare("INSERT INTO  enquiry_prep (enquiry_id, company, industry , location  , role  , salary ) VALUES (:enquiry_id, :company, :industry, :location, :role, :salary )");
        $stmt->bindValue(":enquiry_id", $enquiry_id);
        $stmt->bindValue(":company", $company);
        $stmt->bindValue(":industry", $industry); 
        $stmt->bindValue(":location", $location);   
        $stmt->bindValue(":role", $role);   
        $stmt->bindValue(":salary", $salary);   
        $checkResult = $stmt->execute();
        $lastid = $db->getLast();
        if($checkResult){  
            $db = null;
            return $lastid ;
        }else{            
            $db = null;
            return false;
        } 

    }
    public function save($name, $email, $telephone, $url){ 

        $date = date("d-m-Y H:i");
        $unix_date = time();

        $db = new db;
        $stmt = $db->db->prepare("INSERT INTO  leads (name, email , telephone,  url, date, unix_date  ) VALUES (:name, :email, :phone, :url, :date , :unix_date )");
        $stmt->bindValue(":name", $name);
        $stmt->bindValue(":email", $email); 
        $stmt->bindValue(":phone", $telephone);   
        $stmt->bindValue(":url", $url);
        $stmt->bindValue(":date", $date);  
        $stmt->bindValue(":unix_date", $unix_date);  
         
        $checkResult = $stmt->execute();
        $lastid = $db->getLast();
        if($checkResult){  
            $db = null;
            return $lastid ;
        }else{            
            $db = null;
            return false;
        } 
	}       
	
    function log_visit($ip,  $referrer, $page ){
        $db = new db;
         
        $d = time();
        $stmt = $db->db->prepare("INSERT INTO  tracking (ip, referrer, page, date ) VALUES (:ip, :r, :p, :d)");

        $stmt->bindValue(":ip", $ip);
        $stmt->bindValue(":r", $referrer);    
        $stmt->bindValue(":p", $page);
        $stmt->bindValue(":d", $d);    

        $checkResult = $stmt->execute();
        $lastid = $db->getLast();
        
        if($checkResult){  
            $db = null;
            return $lastid ;
        }else{            
            $db = null;
            return false;
        }  
    }

    public function save_full_page($data){
        $date = date("d-m-Y H:i A");
        $unix_date = time();
        $ip= $_SERVER['REMOTE_ADDR'];

        $db = new db;
        $stmt = $db->db->prepare("
            INSERT INTO  taylor_enquires 
            (
                name, 
                email, 
                telephone,
                company,
                industry,
                location,
                role,
                salary,  
                url, 
                readable_date, 
                unix_date, 
                ip  
            ) 
            VALUES 
            (
                :name, 
                :email, 
                :telephone,
                :company,
                :industry,
                :location,
                :role,
                :salary,
                :url, 
                :readable_date, 
                :unix_date, 
                :ip   )"
        );
        $stmt->bindValue(":name", $data->lead->name);
        $stmt->bindValue(":email", $data->lead->email); 
        $stmt->bindValue(":telephone", $data->lead->telephone);   
        $stmt->bindValue(":company", $data->business->company);
        $stmt->bindValue(":industry", $data->business->industry); 
        $stmt->bindValue(":location", $data->business->location);   
        $stmt->bindValue(":role", $data->business->role);   
        $stmt->bindValue(":salary", $data->business->salary);   
        $stmt->bindValue(":url", $data->lead->url);
        $stmt->bindValue(":readable_date", $date);  
        $stmt->bindValue(":unix_date", $unix_date);  
        $stmt->bindValue(":ip", $ip);  
         
        $checkResult = $stmt->execute();
        $lastid = $db->getLast();
        if($checkResult){  
            $db = null;
            return $lastid;
        }else{            
            $db = null;
            return false;
        } 
    }
       

}