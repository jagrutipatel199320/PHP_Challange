<!DOCTYPE html>
<html>
<head>
   <title>PHP</title>
   <!-- Including jQuery is required. -->
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
   <!-- Including our scripting file. -->
   <script type="text/javascript" src="script.js"></script>
   <!-- Including CSS file. -->
   <link rel="stylesheet" type="text/css" href="style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
   <div class="row" style="padding:20px">
          <input type="text" id="search" placeholder="Search by Description" />

         <div class="radio" id="language">
           <input  name="language" type="radio" value="E">English
           <input name="language"  type="radio" value="F">French
         </div>

   </div>
   <div class="row">
   <!-- Suggestions will be displayed in below div. -->
   <table class="table">
     <thead>
       <tr>
         <th scope="col">Description</th>
         <th scope="col">Lines of Business</th>
       </tr>
     </thead>
     <tbody id="display">
      
     </tbody>
   </table>
    </div>
</div>
</body>
</html>