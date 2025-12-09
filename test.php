<?php 
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Course Submission — One Page</title>
  <style>
    :root{
      --bg:#0f1724; --card:#0b1220; --muted:#94a3b8; --accent:#7c3aed; --glass: rgba(255,255,255,0.04);
      --radius:14px; --gap:18px; font-family: Inter, system-ui, Arial;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{margin:0;background:linear-gradient(180deg,#071027 0%, #071b2b 60%), var(--bg); color:#e6eef8; -webkit-font-smoothing:antialiased; padding:36px;}

    .wrap{max-width:1100px;margin:0 auto;display:grid;grid-template-columns:1fr 420px;gap:28px;align-items:start}
    @media (max-width:980px){.wrap{grid-template-columns:1fr; padding:12px}}

    .card{background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01)); border-radius:var(--radius); padding:22px; box-shadow:0 6px 20px rgba(2,6,23,0.6);}

    header h1{margin:0;font-size:20px;letter-spacing:-0.2px}
    header p{margin:6px 0 0;color:var(--muted);font-size:14px}

    form{margin-top:16px;display:grid;grid-template-columns:repeat(2,1fr);gap:14px}
    @media (max-width:980px){form{grid-template-columns:1fr}}

    label{display:block;font-size:13px;color:var(--muted);margin-bottom:8px}
    input[type=text], input[type=date], input[type=number], select, textarea{width:100%;padding:10px 12px;border-radius:10px;border:1px solid rgba(255,255,255,0.04);background:var(--glass);color:inherit;font-size:14px}
    textarea{min-height:110px;resize:vertical}

    .full{grid-column:1/-1}

    .row{display:flex;gap:12px}
    .small{width:140px}

    .controls{display:flex;gap:10px;align-items:center}
    .btn{background:var(--accent);border:none;padding:10px 14px;border-radius:10px;color:white;font-weight:600;cursor:pointer}
    .btn.ghost{background:transparent;border:1px solid rgba(255,255,255,0.06)}
    .btn.small{padding:8px 10px;font-size:13px}

    .right{position:relative}
    .preview-title{font-size:16px;margin:0 0 8px}
    .meta{color:var(--muted);font-size:13px;margin-bottom:12px}

    .modules{background:rgba(255,255,255,0.02);padding:12px;border-radius:10px;display:flex;flex-direction:column;gap:8px}
    .module-item{display:flex;gap:8px;align-items:center}
    .module-item input{flex:1}

    .helper{font-size:13px;color:var(--muted);margin-top:8px}

    footer{grid-column:1/-1;display:flex;justify-content:space-between;align-items:center;margin-top:8px}

    .error{color:#ffccd5;font-size:13px}

    /* small decorative */
    .logo{width:44px;height:44px;border-radius:10px;background:linear-gradient(135deg,#4c1d95,#06b6d4);display:flex;align-items:center;justify-content:center;font-weight:700}

    .file{padding:8px;border-radius:10px;border:1px dashed rgba(255,255,255,0.04);text-align:center}

    /* responsive preview card */
    .course-card{border-radius:12px;padding:14px;background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));box-shadow:0 6px 18px rgba(2,6,23,0.5)}
    .course-card h3{margin:0 0 6px}
    .pill{display:inline-block;padding:6px 8px;border-radius:999px;font-size:12px;background:rgba(255,255,255,0.03);color:var(--muted)}

  </style>
</head>
<body>
  <div class="wrap">
    <div class="card">
      <header>
        <div style="display:flex;gap:12px;align-items:center">
          <div class="logo">C</div>
          <div>
            <h1>Create a Course</h1>
            <p>Fill the form below to publish a new course. Everything is client-side — try it locally.</p>
          </div>
        </div>
      </header>

      <form id="courseForm" action="test.php" method="POST" enctype="multipart/form-data">
        <div>
          <label for="title">Course Title</label>
          <input id="title" name="title" type="text" placeholder="e.g. Introduction to Web Development" />
        </div>

        <div class="full">
          <label for="desc">Short Description</label>
          <textarea id="desc" name="desc" placeholder="One paragraph summary..." maxlength="500"></textarea>
        </div>

        <div>
          <label for="level">Level</label>
          <select id="level" name="level">
            <option>Beginner</option>
            <option>Intermediate</option>
            <option>Advanced</option>
          </select>
        </div>

        <div>
          <label for="price">Price (USD)</label>
          <input id="price" name="price" type="number" min="0" placeholder="0 for free" />
        </div>

        <div class="full">
          <label>Course Image</label>
          <div class="row">
            <div class="file">Drag & drop or click to select (simulation)</div>
            <div style="flex:1">
              <label for="start"></label>
              <input id="start" name="start" type="file" />
            </div>
          </div>
        </div>

        <div class="full" style="display:flex;justify-content:space-between;align-items:center">
          <div class="error" id="error"></div>
          <div style="display:flex;gap:8px">
            <button type="button" class="btn ghost" id="resetBtn">Reset</button>
            <button name="submit" type="submit" class="btn">Publish Course</button>
          </div>
        </div>
      </form>

    </div>


    <aside class="card right">
        <pre>
            
        <?php 
        
        if(isset($_POST['submit'])){
                   $file=$_FILES['start'];
       $fileName = time() . "_" . basename($file["name"]);
       $path = "C:\\laragon\\www\\brief_6_LMS\\";
       $filePath = $path . $fileName;
       move_uploaded_file($file["tmp_name"], $filePath);

            ?>
            
            <img src="./nouh.png"/>
            
            <?php
                // if(empty($_POST['title'])){
                //     echo "Title is required";
                //     return;
                // }else{
                //     echo htmlspecialchars($_POST['title']);
                // }
            
                // if(empty($_POST['level'])){
                //     echo "Level is required";
                // }elseif(in_array($_POST['level'],["Beginner","Intermediate","Advanced"])){
                //     echo htmlspecialchars($_POST['level']);
                // }
                // else{
                //     echo "hhaaa 3e9et bik a nouh";
                // }
            
                // if(!isset($_SESSION['c'])){
                //     $_SESSION['c']=0;
                // }
                // $_SESSION['c']++;
                // echo $_SESSION['c'];

                
            }

        ?>

        </pre>

    </aside>
  </div>
</body>
</html>