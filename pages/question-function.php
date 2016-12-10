<?php

include "../functions/db.php";
 					date_default_timezone_set("Asia/Taipei");
                        $datetimeCreated=date("Y-m-d h:i:sa");
                        
extract($_POST);
$sql = "INSERT INTO tblpost(postTitle,postContent, categoryID,datetime,userID) 
VALUES ('$title','$content','$category','$datetimeCreated','$userID')";

// INSERT INTO `tblpost`(`postID`, `postTitle`, `postContent`, `categoryID`, `userID`, `typeofPost`, `datetimeCreated`, `statusPost`, `approvedBy`, `imagePost`, `attachmentPost`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11])

$res = mysqli_query($con,$sql);

if($res==true)
                            {
                                   echo '<script language="javascript">';
                                    echo 'alert("Post Successfully")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=home.php" />';
                            }


?>