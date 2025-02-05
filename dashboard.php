<?php
// Start the session to access session data
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: signup.html"); // Redirect to login page
    exit(); // Stop the script here
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="shortcut icon" href="./Screenshot 2024-02-02 213722.png" type="image/x-icon">
    <title>dashboard</title>
    <link rel="stylesheet" href="./dashboard.css">
</head>
<body>
  <div class="container">


    <aside>
        <div class="top">
            <div class="logo">
                <img style=" width: 50px; height: 50px; border-radius: 500px;" src="./Screenshot 2024-02-02 213722.png" alt="logo">
                <h2 style="margin-top: 15px;">Gra<span class="danger">dify</span></h2>
            </div>
            <!-- <div class="close_" id="close-btn">
                <span><i class="fa-solid fa-xmark" style="color:#7380ec; "></i></span>
                
            </div> -->
        </div>
        <div class="sidebar close">
            <a href="#">
                <span><i class="fa-solid fa-bars" style="color: #7380ec; "></i></span>
                <h3 class="text">Dashboard</h3>

            </a>
            <!-- <a href="assignment.html" class="active">
                <span> <i class="fa-solid fa-file-circle-check" style="color: #7380ec;"></i></span>
                <h3 class="text">Assignments</h3>

            </a>             -->

            <a href="assignment.html" class="active">
                <span> <i class="fa-solid fa-file-circle-check" style="color: #7380ec;"></i></span>
                <h3 class="text">Assignments</h3>
            </a>
            
            <a href="attendance.html" class="active">
                <span><i class="fa-solid fa-clipboard-user" style="color:#7380ec;"></i></span>
                <h3 class="text">Attendance</h3>

            </a>           
             <a href="circular.html"class="active">
                <span><i class="fa-solid fa-file" style="color: #7380ec;"></i></span>
                <h3 class="text">Cicular</h3>

            </a>           
             <a href="courses.html" class="active">
                <span><i class="fa-solid fa-book" style="color: #7380ec;"></i></span>
                <h3 class="text">Courses</h3>

            </a>           
             <!-- <a href="" class="active">
                <span><i class="fa-solid fa-message" style="color: #7380ec;"></i></span>
                <h3 class="text">Faculty feedback</h3>

            </a>           -->
             <a href="performance.html" class="active">
                <span><i class="fa-solid fa-square-poll-vertical" style="color: #7380ec;"></i></span>
                <h3 class="text">Performance</h3>

            </a>            
            <!-- <a href="#" class="active">
                <span><i class="fa-solid fa-tarp" style="color: #7380ec;"></i></span>
                <h3 class="text">Project</h3>

            </a>             -->
            <!-- <a href="#" class="active">
                <span><i class="fa-solid fa-clipboard" style="color: #7380ec;"></i></span>
                <h3 class="text">Fees record</h3>

            </a> -->
            <a href="tt.html" class="active">
                <span><i class="fa-solid fa-table" style="color: #7380ec;"></i></span>
                <h3 class="text">Time-table</h3>

            </a>
            <a href="signup.html" class="log-out">
                <span><i class="fa-solid fa-arrow-right-from-bracket" style="color: #7380ec;"></i></span>
                <h3 class="text">Log out</h3>

            </a>

        </div>
    </aside>
    <!-- -------------------END OF ASIDE---------------- -->
    <main>
        <h1>Dashboard</h1>
        <div class="date">
            <input type="date">
        </div>

        <div  class="insights">
            <div style="width: 300px; height: 300px;" class="attendance"><a href="attendance.html">
                 <span><i class="fa-solid fa-clipboard-user" style="color: #121416;"></i></span>
                 <div class="middle">
                    <div class="lef">
                        <h3>Attendance</h3>
                        <h1>Good</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36">
                            </circle>
                        </svg>
                        <div class="number">
                            <p>97%</p>
                        </div>
                    </div>
                 </div>
                 <small class="text-muted">Last 24 hours</small>
            </a></div>
            <!-- -------------END OF ATTENDANCE-------------->
            <div  style="width: 300px; height: 300px;" class="assignments"><a href="assignment.html">
                <span style="color: black;"><i class="fa-solid fa-file-lines" ></i></span>
                <div  class="middle">
                   <div class="lef">
                       <h3>Assignments</h3>
                       <h1>All submitted on time</h1>
                   </div>
                   <div class="progress">
                       <svg>
                           <circle cx="38" cy="38" r="36">
                           </circle>
                       </svg>
                       <div style="margin-top: -50px;" class="number">
                           <p>100%</p>
                       </div>
                   </div>
                </div>
                <small class="text-muted">Last 1 week</small></a>
           </div>
           <!-- -------------END OF ASSIGNMENT-------------->
           <div  style="width: 300px; height: 300px ;" class="circular"><a href="circular.html">
            <span  style="color: black;"><i class="fa-solid fa-circle-exclamation"></i></span>
            <div class="middle">
               <div class="lef">
                   <h3>Circular</h3>
                   <h1>total no. of circulars=5</h1>
               </div>
               <div class="progress">
                   <svg>
                       <circle cx="38" cy="38" r="36">
                       </circle>
                   </svg>
                   <div class="number">
                       <p>50%</p>
                   </div>
               </div>
            </div>
            <small class="text-muted">Last 1 month</small>
      </a> </div>
       <!-- -------------END OF circular-------------->
       <div  style="width: 300px; height: 300px;" class="courses"><a href="courses.html">
        <span style="color: black;"><i class="fa-solid fa-book" ></i></span>
        <div class="middle">
           <div class="lef">
               <h3>Courses</h3>
               <h1>no. of courses = 7 </h1>
           </div>
           <div class="progress">
               <svg>
                   <circle cx="38" cy="38" r="36">
                   </circle>
               </svg>
               <div class="number">
                   <p>notes covered= 80%</p>
               </div>
           </div>
        </div>
        <small class="text-muted">Last 1 month</small>
   </a></div>
   <!-- -------------END OF courses-------------->
   <div  style="width: 300px; height: 300px;" class="performance"><a href="performance.html">
    <span style="color: black;"><i class="fa-solid fa-chart-simple" ></i></span>
    <div class="middle">
       <div class="lef">
           <h3>Performance</h3>
           <h1>academic record</h1>
       </div>
       <div class="progress">
           <svg>
               <circle cx="38" cy="38" r="36">
               </circle>
           </svg>
           <div class="number">
               <p>result= 90%</p>
           </div>
       </div>
    </div>
    <small class="text-muted">Last semester</small></a>
</div>
<!-- -------------END OF perrformace-------------->
<div  style="width: 300px; height: 300px;" class="timetable"><a href="tt.html">
    <span><i class="fa-solid fa-table-cells" style="color: #000000;"></i></span>
    <div class="middle">
       <div class="lef">
           <h3>Time-table</h3>
           <h1>Daily Schedule</h1>
       </div>
       <div class="progress">
           <svg>
               <circle cx="38" cy="38" r="36">
               </circle>
           </svg>
           <div class="number">
               <p>no. of classes today = 5</p>
           </div>
       </div>
    </div>
    <small class="text-muted">Last 24 hours</small></a>
</div>
<!-- -------------END OF TIME-TABLE-------------->
        </div>
    </main>
    <!-- ---------end of main-------------->
    <div class="right">

        <div class="top">
            <button id="menu-btn">
                <span><i class="fa-solid fa-bars" style="color: #000000;"></i></span>
            </button>
            <div class="theme-toggler">
                <span class="fa-solid fa-sun active"><i></i></span>
                <span  class="fa-solid fa-moon"><i></i></span>
            </div>
            <div class="profile">
                <div class="info">
                    <p style="font-size: medium;margin-left: -10px;">Hey, <b>Aditi</b></p>
                    <small style="font-size: small;" class="text-muted">Admin</small>
                </div>

            </div>
        </div>
    <div class="prof">
       
        <div class="img-prof">
            <img style="border-radius: 30000px;" src="prof.png" alt="profile_">
        </div>
       <a href="profile.html"><button style="background-color: transparent;"><div class="admin-prof"><h2>Profile ▼</h2>
    </div>
    

</button></a> 
        
  </div>
</div>
</div>  
<script  src="./dashboard.js"></script>
</body>
</html>