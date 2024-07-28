<!--

 <form class="needs-validation" novalidate name="signup" action="topaypal.php", method="post" >

-->
<?php

  include "./library/include.inc";
  include "./library/paypal.inc";
include "./library/emailer.php";

?>


<form class="row g-3" action="./topaypal_join.php", method="POST">

  <div class="col-md-6">
    <div class="input-group">
    <span class="input-group-text" id="inputGroupPrepend1" name="fname">First Name</span>
    <input type="text" class="form-control BackInput" id="validationDefault01"  name="fname" required>
     </div>
  </div>

  <div class="col-md-6">
    <div class="input-group">
    <span class="input-group-text" id="inputGroupPrepend2" >Last Name</span>
    <input type="text" class="form-control BackInput" id="validationDefault02" name="lname" required>
    </div>
  </div>

  <p>

  <div class="col-md-12">&nbsp;</div>
  
  <div class="col-md-3">
    <div class="input-group">
    <span class="input-group-text " id="inputGroupPrepend5">Gender</span>

    <select class="form-select BackInput" id="validationDefault05" name="gender" notrequired>
      <option selected enabled value="">Choose...</option>

      <option value="-">-</option>
      <option value="M">M</option>
      <option value="F">F</option>
    </select>

</div>


  </div>

  <div class="col-md-3">
  <div class="input-group">

    <span class="input-group-text" id="inputGroupPrepend6">NTRP</span>
    <select class="form-select BackInput" id="validationDefault06" name="ntrp" notrequired>
      <option selected enabled value="">Choose...</option>
      <option value="-">-</option>
      <option value="3.0">3.0</option>
      <option value="3.5">3.5</option>
      <option value="4.0">4.0</option>
      <option value="4.5">4.5</option>
      <option value="5.0+">5.0+</option>
    </select>

</div>

</div>
 
   <hr/>

   <div class="col-md-12">&nbsp; </div>

   <div class="col-md-8">

<div class="input-group">
<span class="input-group-text" id="inputGroupPrepend7">Email</span>
 <input type="email" class="form-control  BackInput" id="validationDefault07" name="email"  required>
</div>

<p>
<div class="input-group">
<span class="input-group-text" id="inputGroupPrepend7">Password</span>
 <input type="password" class="form-control  BackInput" id="validationDefault08" name="password"  required>
</div>
<p>
<div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" name="ggtc" required >
      <label class="form-check-label" for="invalidCheck2"> GGTC Member </label>
    </div>

</div>


   <div class = "col-12" >
    <hr/>
    <p>
   </div>



  <div class = "col-12"> &nbsp;</div>

  <div class = "col-12">
<!--
  <span><h4 style="color:rgb(25, 0, 255)">Select this: </h4></span> 

    <p>
        By checking this box, and submitting this application to Santa Clara Tennis Club,
        the signee above hereby agrees to indemnify and hold harmless the City of Santa Clara 
        and the Santa Clara Tennis Club, from and against any and all liabilities for any injury which may be incurred 
        by the undersigned arising out of, or in any way connected in any event sponsored by the aforenamed.
 -->                
   </div>

<!--
   <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required
  
      >

      <label class="form-check-label" for="invalidCheck2">
        All items above are accurate.
      </label>
    </div>
  </div>
-->
  <div class="col-12"> &nbsp;</div>
  <div class="col-12">
    <button class="btn btn-primary" disabled=true type="submit">Thanks for playing!</button>
  </div>
</form>
