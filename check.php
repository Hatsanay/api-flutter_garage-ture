<?php
    require "connect.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $data = array();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = mysqli_query($con, "SELECT * FROM members WHERE memusername='$username' AND mempassword='$password'");
        $cek = mysqli_fetch_array($query);

    if(isset($cek) && $cek != null && $cek['memlavel'] == 2){
            
        $query2 = mysqli_query($con, "SELECT * FROM members
        INNER JOIN garage ON garage.memid = members.memid
        WHERE memusername='$username' AND mempassword='$password'");
        $cek2 = mysqli_fetch_array($query2);
        if(isset($cek2) && $cek2 != null){
            $data['msg'] = "DATA ADA";
            $data['level'] = $cek2['memlavel'];
            $data['username'] = $cek2['memusername'];
            $data['fullname'] = $cek2['memfullname'];
            $data['id'] = $cek2['memid'];
            $data['proflie'] = $cek2['memproflie'];
            $data['garageid'] = $cek2['garageid'];
            $data['garagename'] = $cek2['garagename'];
            $data['garagetel'] = $cek2['garagetel'];
            $data['garagelattitude'] = $cek2['garagelattitude'];
            $data['garagelonggitude'] = $cek2['garagelonggitude'];
            $data['garageprofile'] = $cek2['garageprofile'];
            $data['garageonoff'] = $cek2['garageonoff'];
            $data['ownerid'] = $cek2['ownerid'];
            $data['garagedeegree'] = $cek2['garagedeegree'];

            // $data['garagehousenum'] = $cek['garagehousenum'];
            // $data['garagegroup'] = $cek['garagegroup'];
            // $data['garageroad'] = $cek['garageroad'];
            // $data['garagealley'] = $cek['garagealley'];
            // $data['district'] = $cek['name_th'];


            // $data['fullname'] = $cek['custumer.cusfullname'];
            echo json_encode($data);
        }  
    }
    else if(isset($cek) && $cek != null && $cek['memlavel'] == 3){
            
        $query3 = mysqli_query($con, "SELECT * FROM members
        INNER JOIN mechanic ON mechanic.memid = members.memid
        WHERE memusername='$username' AND mempassword='$password'");
        $cek3 = mysqli_fetch_array($query3);
        if(isset($cek3) && $cek3 != null){
            $data['msg'] = "DATA ADA";
            $data['level'] = $cek3['memlavel'];
            $data['username'] = $cek3['memusername'];
            $data['id'] = $cek3['memid'];
            $data['proflie'] = $cek3['memproflie'];
            $data['mechanicid'] = $cek3['mechanicid'];
            $data['mechanicfullname'] = $cek3['mechanicfullname'];
            $data['mechanicsex'] = $cek3['mechanicsex'];
            $data['mechanicbirthday'] = $cek3['mechanicbirthday'];
            $data['mechanictel'] = $cek3['mechanictel'];
            $data['mechanicprofile'] = $cek3['mechanicprofile'];
            $data['mechaniconoff'] = $cek3['mechaniconoff'];
            
            
            echo json_encode($data);
        }  
    }
    else{
        $data['msg'] = "DATA TIDAK ADA";
        echo json_encode($data);
    }
        
    }

    // if($_SERVER['REQUEST_METHOD'] == "POST"){
    //     $data = array();

    //     $username = $_POST['username'];
    //     $password = $_POST['password'];

    //     $query = mysqli_query($con, "SELECT * FROM members
    //     INNER JOIN garage ON garage.memid = members.memid
    //     INNER JOIN districts ON garagedistrict = districts.id
    //     INNER JOIN amphures ON garagearea = amphures.id
    //     INNER JOIN provinces ON garageprovince = provinces.id
    //     WHERE memusername='$username' AND mempassword='$password'");
    //     $cek = mysqli_fetch_array($query);

    //     if(isset($cek) && $cek != null){
    //         $data['msg'] = "DATA ADA";
    //         $data['level'] = $cek['memlavel'];
    //         $data['username'] = $cek['memusername'];
    //         $data['fullname'] = $cek['memfullname'];
    //         $data['id'] = $cek['memid'];
    //         $data['proflie'] = $cek['memproflie'];
    //         $data['garageid'] = $cek['garageid'];
    //         $data['garagename'] = $cek['garagename'];
    //         $data['garagetel'] = $cek['garagetel'];
    //         $data['garagelattitude'] = $cek['garagelattitude'];
    //         $data['garagelonggitude'] = $cek['garagelonggitude'];
    //         $data['garageprofile'] = $cek['garageprofile'];
    //         $data['garageonoff'] = $cek['garageonoff'];
    //         $data['ownerid'] = $cek['ownerid'];
    //         $data['garagedeegree'] = $cek['garagedeegree'];

    //         // $data['garagehousenum'] = $cek['garagehousenum'];
    //         // $data['garagegroup'] = $cek['garagegroup'];
    //         // $data['garageroad'] = $cek['garageroad'];
    //         // $data['garagealley'] = $cek['garagealley'];
    //         // $data['district'] = $cek['name_th'];


    //         // $data['fullname'] = $cek['custumer.cusfullname'];
    //         echo json_encode($data);
    //     }else{
    //         $data['msg'] = "DATA TIDAK ADA";
    //         echo json_encode($data);
    //     }
    // }
?>