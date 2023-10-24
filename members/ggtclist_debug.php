

<style>
   tr {
    line-height: 10px;
    min-height: 8px;
    height: 4px;
    color: blue;
    font-size : small;
 }
</style> 


<div class="col-sm ">

   
</div>




<table class="table table-striped ">
<thead>
<tr>
    <th scope="col">Year </th>
    <th scope="col">First Name </th>
    <th scope="col">Last Name </th>
    <th scope="col">Address </th>
    <th scope="col">CITY </th>
    <th scope="col">NTRP </th>
    <th scope="col">EPOCH </th>
    
    <th scope="col">Date </th>
    

</tr>
</thead>

<tbody>
<?php
 function ABBR($CITY){
    $abbreviations = array( "jose" => "SJ", "sunnyvale" => "Su" ,"clara"=>"SC",
    "campbell"=>"Cpb","saratoga"=>"Srt","milpitas"=>"Mlp","mountain"=>"MV",
    "burl"=>"Blg","palo"=>"PA","fremont"=>"Fmt","soquel"=>"Soq",
    "cupertino"=>"Cup","gatos"=>"LG","sereno"=>"MS","menlo"=>"MP",
    "union"=>"UC","los altos"=>"LA","newark"=>"Nwk","menlo"=>"MP",
    "capitola"=>"Cap","san carlos"=>"SanC","millbrae"=>"Milb","menlo"=>"MP",
    "mtn"=>"MV","san carlos"=>"SanC","millbrae"=>"Milb","menlo"=>"MP",
    "redwood"=>"RC","mateo"=>"SM","morgan"=>"MH","sunny" => "Su",
    "san francisco"=>"SF","emerald hills"=> "EH", "hayward"=>"Hay",
    "brisbane"=>"Bris","san ramon"=>"SR","york"=>"NYC"
    );

    foreach ( $abbreviations as $key => $value){
        if( preg_match( "/".$key."/i",$CITY)) {
            $CITY = $value;
            return $CITY;
        }

   }

       return $CITY;

}
    function ggtclist($YEAR){


         $con = Configure();

         $query = "select * from ".TABLE_PAYPAL." where year>=$YEAR order by year,lname limit 3000 ";
 //        $query = "select * from ".TABLE_PENDING." where year=$YEAR order by date desc limit 30 ";
         TEXT($query);

         $icon="";
         $qr=mysqli_query($con,$query);
                  while ($row = mysqli_fetch_assoc($qr)) {  
 
                    echo("<tr> ");
                    echo("<td>");
                    echo( $row['year']);
                    echo("</td>");

                    echo("<td>");
                    echo($row[FNAME]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[LNAME]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[ADDRESS]  );
                    echo("</td>");

                    echo("<td>");
                    echo(ABBR( $row[CITY])  );
                    echo("</td>");

                    echo("<td>");
                    echo($row[PAYMENT]);
                    echo("</td>");

                    echo("<td>");
                    echo($row[GENDER].$row[NTRP]);
                    echo("</td>");

                    echo("<td>");
                    echo( date(" m/d/y",$row[DATE]).$icon );
                    echo("</td>");
                    echo("</tr> ");

                    }

            }
            
    function membership_json( $URL ){

                $ch = curl_init( $URL );
                curl_setopt( $ch  , CURLOPT_POSTFIELDS, $payload );
                curl_setopt( $ch  , CURLOPT_RETURNTRANSFER, true );
      
                $response = curl_exec($ch);
                curl_close($ch);
                $obj = json_decode($response, $assoc= TRUE);
                return $obj;
      
    }
    function ggtclist_new(){


       $URL = "http://www.sctennisclub.org/ggtc/members_/json.php";
       $obj = membership_json($URL);
    
      // print_r($obj);
       foreach($obj as $row) {  
        echo("<tr> ");
        echo("<td>");
        echo( $row["year"]);
        echo("</td>");

        echo "<td>".$row[FNAME]."</td>";
        echo "<td>".$row[LNAME]."</td>";
        echo "<td>".$row[ADDRESS]."</td>";
        echo "<td>".ABBR($row[CITY])."</td>";
        
        echo "<td>".$row[GENDER].$row[NTRP].$d."</td>";

        echo "<td>".$row[DATE]."</td>";
        echo( "<td>".date(" m/d/y",$row[DATE]).$icon."</td>" );

  
   }

    }
            ggtclist_new();
//          ggtclist(YEAR);
            

      
?>
 </body>
</table>


