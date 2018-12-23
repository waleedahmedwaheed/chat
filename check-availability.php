<?php
include_once 'connection.php';
 
$data = [];
$emailId = htmlspecialchars($_POST['email_id']);
try{
    $data['status'] = false;
 
    if (!filter_var($emailId, FILTER_VALIDATE_EMAIL)) {
        $data['message'] = "Invalid email format";
    } else {
        $stmt = $conn->prepare('select email from users where email = ?');
        $stmt->bind_param('s',$emailId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows<1){
            $data['message'] = 'Email id available!';
            $data['status'] = true;
        }else{
            $data['message'] = 'Email id already exist!';
        }
    }
 
}
catch (\Exception $exception){
    $data['message'] = $exception->getMessage();
}
 
echo json_encode($data);