
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search Candidates</title>
	<style>
    body {
      background-color: #4FC3F7;
      font-family: Arial, sans-serif;
    }

    form {
      width: 60%;
      /* min-width: 500px; */
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-top: 20px;
      margin-bottom: 10px;
    }

    input[type="text"],
    textarea {
      display: block;
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      margin-bottom: 10px;
    }

    button[type="button"] {
      display: block;
      padding: 10px;
      margin-bottom: 20px;
      background-color: #2196F3;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"] {
      display: block;
      padding: 10px;
      margin-top: 20px;
      background-color: #2196F3;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .degree,
    .certificate,
    .experience,
    .work,
    .reference,
    .skill {
      margin-bottom: 20px;
      border: 1px solid #ddd;
      padding: 10px;
      border-radius: 5px;
    }

    .degree input[type="text"],
    .certificate input[type="text"],
    .experience input[type="text"],
    .work input[type="text"],
    .reference input[type="text"],
    .skills input[type="text"] {
      width: calc(33.33% - 10px);
      margin-right: 10px;
    }

    .certificate input[type="text"],
    .certificate input[type="date"] {
      width: calc(25% - 10px);
      margin-right: 10px;
    }

    .experience input[type="text"] {
      width: calc(25% - 10px);
      margin-right: 10px;
    }

    .work input[type="text"] {
      width: calc(25% - 10px);
      margin-right: 10px;
    }

    .reference input[type="text"] {
      width: calc(25% - 10px);
      margin-right: 10px;
    }

    .reference input[type="email"] {
      width: calc(33.33% - 10px);
      margin-right: 10px;
    }
    p{
        margin-top: 2%;
        font-size: 20px;
    }
    #profile-type{
        margin-bottom: 30px;
        font-size: 2.5vw;
    }
    @media (max-width: 650px) {
        #profile-type{
            font-size: 30px;
        }
      .degree input[type="text"],
      .certificate input[type="text"],
      .experience input[type="text"],
      .work input[type="text"],
      .reference input[type="text"],
      .reference input[type="email"],
      .certificate input[type="date"] {
        width: 100%;
        margin-right: 0;
      }

      form {
        width: 95%;
      }
    }
  </style>
	<link rel="stylesheet" href="./pages/styles.css">
</head>
<header>
    <div class = "logo" >CV MANAGEMENT</div>
    <ul class = "nav" id="list">
        <li>
            <a href="./index.php?page=home" title = "CVMangement home page">Home</a>
        </li>
        <li>
            <a href="#" title = "CVMangement candidate search">Candidate Search</a>
        </li>
    </ul>
    <button onclick="myFunction()"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQtJREFUSEvNlNFxwkAMRN9WACUkFSSUQAdJB0kFKSGmAoYKKAFKSAl0kJSQVCBGjM3gs33yGJugH33ceZ9O8kpMHJpYn14AM3sGPgHPHgdgJclzNkKAmb0Auw6VV0n7HCELMLM58A14botf4FGS59aIALnqK8GlpK+hgKLsfa4LPgu/d58v8N7/ALOOAv+Ah8EzcNFJ/6Kq6tIH3udLHxSj+CAyUnQeGi0SiM47AaXJPgD3QtWaVM9XhTt50zXoVoCZvQHrjINTkDv5vW1tNACl+DZ6et/dVAP02D0Rt7GbUkCf1RBBaqsjBfjQniKF4PwgaVHdSQF2pfjpc0ln3dsCxqg+1fg/J4/1miOvUlsZTgKRSgAAAABJRU5ErkJggg=="/></button>
    <ul class = "nav" id="profile">
        <li>
            <a href="./index.php?page=company">Profile</a>
        </li>
        <li>
            <a href="./index.php?page=logout">Log out</a>
        </li>
    </ul>
</header>
<!-- <body>
<h1>Search Candidates</h1>
	<form method="post" action="search.php">
		<label for="degree">Degree:</label>
		<input type="text" name="degree" placeholder="Enter degree...">
		
		<label for="certificate">Certificate:</label>
		<input type="text" name="certificate" placeholder="Enter certificate...">
		
		<label for="skills">Skills:</label>
		<input type="text" name="skills" placeholder="Enter skills...">
		
		<label for="location">Location:</label>
		<input type="text" name="location" placeholder="Enter location...">
		
		<input type="submit" value="Search Candidates">
	</form>
</body> -->
<body>
  
  <form action="./index.php?page=submit_cv" method="POST">
    <h1 id="profile-type" style="font-size:40px;">Search Candidates</h1>

    <h2>Education</h2>
    <div class="degree">
      <input type="text" name="degree[]" placeholder="Degree Name">
    </div>
    <button type="button" onclick="addDegree()">Add Degree</button>

    <h2>Certificates</h2>
    <div class="certificate">
      <input type="text" name="certificate_title[]" placeholder="Certificate Title">
    </div>
    <button type="button" onclick="addCertificate()">Add Certificate</button>
    <h2>Skills</h2>
    <div class="skill">
      <input type="text" name="skill[]" placeholder="Skill Name">
    </div>
    <button type="button" onclick="addSkill()">Add Skills</button>
    <input type="submit" value="Submit">
  </form>

</body>
<script>
    function addSkill(){
    // Create a new div element with the degree class
    console.log("aaaaaaaa");
    var newDegree = document.createElement('div');
    newDegree.className = 'skill';

    // Add input fields for degree name, school name, and year
    newDegree.innerHTML = '<input type="text" name="skill[]" placeholder="Skill Name">';

    // Insert the new degree block after the last degree block
    var degrees = document.getElementsByClassName('skill');
    var lastDegree = degrees[degrees.length - 1];
    lastDegree.parentNode.insertBefore(newDegree, lastDegree.nextSibling);
  }
  function addDegree() {
    // Create a new div element with the degree class
    var newDegree = document.createElement('div');
    newDegree.className = 'degree';

    // Add input fields for degree name, school name, and year
    newDegree.innerHTML = '<input type="text" name="degree[]" placeholder="Degree Name">';

    // Insert the new degree block after the last degree block
    var degrees = document.getElementsByClassName('degree');
    var lastDegree = degrees[degrees.length - 1];
    lastDegree.parentNode.insertBefore(newDegree, lastDegree.nextSibling);
  }

  function addCertificate() {
    // Create a new div element with the certificate class
    var newCertificate = document.createElement('div');
    newCertificate.className = 'certificate';

    // Add input fields for certificate title, organization name, year, and expiration date
    newCertificate.innerHTML = '<input type="text" name="certificate_title[]" placeholder="Certificate Title">';

    // Insert the new certificate block after the last certificate block
    var certificates = document.getElementsByClassName('certificate');
    var lastCertificate = certificates[certificates.length - 1];
    lastCertificate.parentNode.insertBefore(newCertificate, lastCertificate.nextSibling);
  }
    function myFunction() {
        const show = document.getElementById('profile');
        const lst = document.getElementById('list');
        const button = document.querySelector('header button');
        if (!show.style.display || show.style.display == 'none')
            show.style.display = 'block';
        else
            show.style.display = 'none';

        if (window.innerWidth <= 650 && show.style.display == 'block'){
            lst.style.display = 'none';
            // button.style.margin-right = 'auto';
        }
        else{
            lst.style.display = 'block';
        }
    }
</script>
</html>