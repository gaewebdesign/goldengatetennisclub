<html>

<head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
 .navbar-brand{
   font-size: smaller;
 }

 .dropdown-item{

#
#    background-color: #fff; /* here */
#    background: #fff;
     background-color: rgb(202,233,245);
     background: rgb(202,233,245);    
 }

   .dropdown{
     color: blue;
      font-size: smaller;

   }

   .colorfill{
    background: rgb(202,233,245);
  }
      

</style>

</head>
<!--

https://getbootstrap.com/docs/5.1/getting-started/introduction/

-->



<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">

    <a class="navbar-brand" href="./index.html">Home</a> 
      <a class="navbar-brand" href="./membership.html">Membership</a>

<!--
      <a class="navbar-brand" href="./members.html">Members</a>
      <a class="navbar-brand" href="./events.html">Events</a>
      <a class="navbar-brand Link_Red" href="./join.html">Join</a>
      <a class="navbar-brand" href="./photos.html">Photos</a>
      <a class="navbar-brand" href="./archive.html">Archive</a>

-->
  <!-- <a class="navbar-brand" href="./resources.html">Resources</a>  -->

      <div class="dropdown" >
          <a class="dropdown-toggle"  id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
            Tournament
          </a>
        <ul class="dropdown-menu dropdown-menu-dark colorfill" aria-labelledby="dropdownMenuButton2">
<!-- 
          <li><a class="dropdown-item active" href="./tournament.html?draw=0">Info</a></li>
              <li><a class="dropdown-item dropdown-menu-dark colorfill" disabled href="./tournament.html?draw=1">Players</a></li>
              <li><a class="dropdown-item" href="./tournament.html?draw=2">Draws (M 3.5)</a></li>
              <li><a class="dropdown-item" href="./tournament.html?draw=3">Draws (M 4.0)</a></li>
              <li><hr class="dropdown-divider" style="border-color:black;"></li>
-->
              <li><a class="dropdown-item "  href="./debug_tournament.phtml?mode=1">Reorder M4.0</a></li>
              <li><a class="dropdown-item "  href="./debug_tournament.phtml?mode=2">Reorder M3.5</a></li>

              <li><a class="dropdown-item "  href="./debug_tournament.phtml?mode=3">Set To Default 4.0 </a></li>
              <li><a class="dropdown-item "  href="./debug_tournament.phtml?mode=4">Set To Default 3.5</a></li>



        </ul>
        </div>

 </p>
      
</body>
</html>

<!--


<a href="./index.html"> Home </a> |    
                  <a href="./info.html"> 
                  <a href="./membership" >Membership </a>|
                  <a href="./events" >Events</a>|
                  <a href="./members" >Members </a>|
                  <a href="./join" class="Link_Red" >Join </a>|                 
                  <a href="./photos" >Photos </a> |
                  <a href="./archive" >Archive</a>  |
                  <a href="./resources" >Resources </a> |




<a href="./map" >GGTC Map </a>

-->
             