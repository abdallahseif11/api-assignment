<?php
$db = mysqli_connect('localhost','root','','patients');
if( $db )
{   


    if( isset($_GET['id']) && isset($_GET['patientid']) && isset($_GET['condition']))
    {
        $id = $_GET['id'];
        $patientid = $_GET['patientid'];
        $condition = $_GET['condition'];
        $sql = mysqli_query($db,"SELECT * FROM patientinfo WHERE id = '$id' AND patientid = '$patientid' AND condition = '$condition'");

        
    if( mysqli_num_rows($sql) >= 1)
    {
        ?>
        <html>
            <head>
                <title>patient</title>
            </head>
            <body>

                <hr/>
                
                <?xml version="1.0" encoding="UTF-8" 
                header("Content-type: text/xml; charset-utf-8"); 
                >

                <?php 
                    while($vals = mysqli_fetch_array($sql))
                    {
               
         $id = $vals['id'];
                        $patientid = $vals['patientid'];
                        $condition = $vals['condition'];

                        ?>
                        <note>
                          <fname><h1>id: <em><?php echo $id; ?></em></h1></to>
                          <lname><h1>Patient id: <em><?php echo $patientid; ?></em></h1></from>
                          <sname><h1>condition:  <em><?php echo $condition; ?></em></h1></sname>
                        </note>
                        <?php
                    }

                ?>

                <hr/>
            </body>
        </html>


        <?php 
    }
    else
    {
        echo "The table is empty!";
    }

    }
    else
    {
        echo "<h1>The id is not set.</h1>";
    }

}
else{ echo "The connection was not successful!"; }

?>