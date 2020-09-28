<?php

namespace project;

foreach (glob("inc/*.php") as $filename) { include $filename; }

require 'vendor/autoload.php';

session_start();

ini_set('display_errors', 'On');
ini_set('memory_limit', '-1');
error_reporting(1); 

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$method;
$data;
$jsonLogic = new logic();
// $lead_email = "james@opopmedia.co.uk"; // testx
// $lead_email = "pedro@opopmedia.co.uk"; // testx
$lead_email = "david.taylor@tailored-personnel.com";
    
if ($contentType === "application/json") {
    $content =  trim(file_get_contents("php://input"));  
    if($jsonLogic->is_JSON($content)){ 
        $json= json_decode($content); 
        $data = $json->data;
        $method = $json->method;
        $token = $json->token;
        // var_dump( $content ); 
    }else{ 
        echo "MALFORMED JSON - " . $content;
    }

}else{
    echo "CONTENT TYPE NOT `application/json` - " . $contentType;
} 

if (!empty($token)) {
    if (hash_equals($_SESSION['token'], $token)) {
        switch($method){ 
            case 'save_full_page_form':
                session_start();  
                $result_arr = array("success" => true); 
                $lead = new lead();  
                $saved = $lead->save_full_page($data);

                if ($saved) {
                    $_SESSION["enquiry_id"] = $saved;
                    $waypoint_result = $lead->write_to_waypoint($data->lead, $data->business);
                    $result_arr["waypoint"] = $waypoint_result == "ACCEPTED";
                    $result_arr["success"] = true;
                    $_SESSION["name"]  = $data->lead->name;
                    $_SESSION["email"]  = $data->lead->email;
                    $_SESSION["telephone"]  = $data->lead->telephone;
                    $logic = new logic();
                    $logic->send_mail($lead_email, $data->business, "followup" );
                    $logic->send_mail($data->lead->email, $data->lead, "thankyou" );
                    
                } else {
                    $result_arr["success"] = false;
                }
                    
                
                echo json_encode($result_arr);
                break;

            case "all_data_form":
                session_start();  
                $result_arr = array("success" => true); 

                $lead = new lead();  

                $lead_id = $lead->save($data->lead->name, $data->lead->email, $data->lead->telephone, $data->lead->url);
                $enq = $lead->enquiry_data($lead_id, $data->business->company, $data->business->industry, $data->business->location, $data->business->role, $data->business->salary);
                
                $waypoint_result = $lead->write_to_waypoint($data->lead, $data->business);

                if(!$lead_id){
                    $result_arr = array("success" => false);
                }else{
                    $result_arr["enq_id"] = $lead_id;
                    
                    $result_arr["waypoint_result"] = $waypoint_result;

                    $_SESSION["enquiry_id"] = $lead_id;
                    $_SESSION["name"]  = $data->lead->name;
                    $_SESSION["email"]  = $data->lead->email;
                    $_SESSION["telephone"]  = $data->lead->telephone;

                    $logic = new logic();
                    $logic->send_mail($lead_email, $data->business, "followup" );
                    $logic->send_mail($data->lead->email, $data->lead, "thankyou" );
                    


                }
                echo json_encode($result_arr);
        
                break; 



            case "submit_equiry_data_form":
                    session_start();  
                    $result_arr = array("success" => true); 
            
                    $lead = new lead();  
                    $enq = $lead->enquiry_data($data->enquiry_id, $data->company, $data->industry, $data->location, $data->role, $data->salary);
                    

                    // $data->name = $_SESSION["email"];
            
                    $logic = new logic();
                    $logic->send_mail($lead_email, $data, "followup" );
            
                    if(!$enq){
                        $result_arr = array("success" => false); 
                    }
                    echo json_encode($result_arr);
                    break; 
            
            

            case "submit_form":

                session_start();  
                $result_arr = array("success" => true); 

                $lead = new lead();  
                $lead_id = $lead->save($data->name, $data->email, $data->telephone);
                if(!$lead_id){
                    $result_arr = array("success" => false);
                }else{
                    $result_arr["enq_id"] = $lead_id;

                    $_SESSION["enquiry_id"] = $lead_id;
                    $_SESSION["name"]  = $data->name;
                    $_SESSION["email"]  = $data->email;
                    $_SESSION["telephone"]  = $data->telephone;

                    $logic = new logic();
                    $logic->send_mail($lead_email, $data, "lead" ); 
                    $logic->send_mail($data->email, $data, "thankyou" );
                    


                }
                echo json_encode($result_arr);
                break; 

                    
            case "log_visitor":
                session_start();  
                $result_arr = array("success" => false);   
                $lead = new lead();  
                $result = $lead->log_visit($_SERVER['REMOTE_ADDR'], $data->referrer, $data->page);

                if($result){
                    $result_arr["success"] = true;
                    echo json_encode($result_arr); 
                }else{
                    echo json_encode($result_arr); 
                }


                break;
            default:
                echo "METHOD NOT FOUND...";
                break; 
        }
        
    } 
}