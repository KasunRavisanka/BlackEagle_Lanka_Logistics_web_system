<?php   
    include_once '../model/model.php';
    $modelObj = new Model();
    $array1 = ["$userId", "$roleId", "$moduleId"];
    $timeout_duration = 10;
    $logoutUserId = $array1[0];

    if (!isset($_SESSION["user"]["userId"]) | !isset($_SESSION["user"]["roleId"])) {
        session_unset();
        session_destroy();
        $userId = $array1[0];
        $modelObj->makeOfflineLoginStatus($userId); 
        $msg = "Session Timeout";
        $msg = base64_encode($msg); ?>            
        <script>window.location="login.php?msgWarning=<?php echo $msg; ?>"; </script>
<?php  
    }

    // if ($moduleId == null) {
    //     session_unset();
    //     session_destroy();
    //     $userId = $array1[0];
    //     $modelObj->makeOfflineLoginStatus($userId); 
    //     $msg = "Session Timeout";
    //     $msg = base64_encode($msg); ?>            
        <!-- <script>window.location="login.php?msgWarning=<?php echo $msg; ?>"; </script> -->
<?php
    // } 
    ?>
<!-- 
<script type="text/javascript">
    let idleTimer;
    function resetTimer() {
        clearTimeout(idleTimer);
        idleTimer = setTimeout(function() {
            window.location="backend.php?status=logout&logoutUserId=<?php echo $logoutUserId; ?>";
        }, 1800000); 
    }
    window.onload = resetTimer;
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;
    document.onclick = resetTimer;
</script> -->
    