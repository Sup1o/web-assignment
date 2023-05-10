<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./pages/styles.css">
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
    .reference {
      margin-bottom: 20px;
      border: 1px solid #ddd;
      padding: 10px;
      border-radius: 5px;
    }

    .degree input[type="text"],
    .certificate input[type="text"],
    .experience input[type="text"],
    .work input[type="text"],
    .reference input[type="text"] {
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

    @media (max-width: 650px) {

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
</head>
<header>
  <div class="logo">CV MANAGEMENT</div>
  <ul class="nav" id="list">
    <li>
      <a href="./index.php?page=home" title="CVMangement home page">Home</a>
    </li>
    <li>
      <a href="./index.php?page=find_jobs" title="CVMangement find jobs page">Find Jobs</a>
    </li>
    <li>
      <a href="./index.php?page=create_cv" title="CVMangement CV page">Create CV</a>
    </li>
  </ul>
  <button onclick="myFunction()"><img
      src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQtJREFUSEvNlNFxwkAMRN9WACUkFSSUQAdJB0kFKSGmAoYKKAFKSAl0kJSQVCBGjM3gs33yGJugH33ceZ9O8kpMHJpYn14AM3sGPgHPHgdgJclzNkKAmb0Auw6VV0n7HCELMLM58A14botf4FGS59aIALnqK8GlpK+hgKLsfa4LPgu/d58v8N7/ALOOAv+Ah8EzcNFJ/6Kq6tIH3udLHxSj+CAyUnQeGi0SiM47AaXJPgD3QtWaVM9XhTt50zXoVoCZvQHrjINTkDv5vW1tNACl+DZ6et/dVAP02D0Rt7GbUkCf1RBBaqsjBfjQniKF4PwgaVHdSQF2pfjpc0ln3dsCxqg+1fg/J4/1miOvUlsZTgKRSgAAAABJRU5ErkJggg==" /></button>
  <ul class="nav" id="profile">
    <li>
      <a href="./index.php?page=profile">Profile</a>
    </li>
    <li>
      <a href="./index.php?page=logout">Log out</a>
    </li>
  </ul>
</header>

<body>
  <?php // Check if the form was submitted successfully
  if (isset($_GET['success']) && $_GET['success'] == 'true') {
    echo '<script>alert("CV created successfully!")</script>';
  } ?>
  <form action="./index.php?page=submit_cv" method="POST">
    <h2>Job Objective</h2>
    <input type="text" name="job_objective">

    <h2>Education</h2>
    <div class="degree">
      <input type="text" name="degree[]" placeholder="Degree Name">
      <input type="text" name="school[]" placeholder="School Name">
      <input type="text" name="year[]" placeholder="Year">
    </div>
    <button type="button" onclick="addDegree()">Add Degree</button>

    <h2>Certificates</h2>
    <div class="certificate">
      <input type="text" name="certificate_title[]" placeholder="Certificate Title">
      <input type="text" name="certificate_organization[]" placeholder="Organization Name">
      <input type="text" name="certificate_year[]" placeholder="Year">
      <input type="text" name="certificate_expiration[]" placeholder="Expiration Date">
    </div>
    <button type="button" onclick="addCertificate()">Add Certificate</button>

    <h2>Professional Experience</h2>
    <div class="experience">
      <input type="text" name="experience_title[]" placeholder="Title">
      <input type="text" name="experience_company[]" placeholder="Company Name">
      <textarea name="experience_description[]" placeholder="Description"></textarea>
    </div>
    <button type="button" onclick="addExperience()">Add Experience</button>

    <!-- <h2>Working History</h2>
    <div class="work">
      <input type="text" name="work_title[]" placeholder="Title">
      <input type="text" name="work_company[]" placeholder="Company Name">
      <textarea name="work_tasks[]" placeholder="Tasks"></textarea>
    </div>
    <button type="button" onclick="addWork()">Add Work</button> -->

    <h2>Additional Information</h2>
    <textarea name="additional_info"></textarea>

    <h2>References</h2>
    <div class="reference">
      <input type="text" name="reference_name[]" placeholder="Name">
      <input type="text" name="reference_phone[]" placeholder="Phone Number">
      <input type="text" name="reference_email[]" placeholder="Email">
      <input type="text" name="reference_relationship[]" placeholder="Relationship">
    </div>
    <button type="button" onclick="addReference()">Add Experience</button>

    <input type="submit" value="Submit">
  </form>

</body>
<script>
  // function myFunction() {
  //     if(confirm("Are you sure you want to log out?")){
  //         window.location.href = "./index.php?page=logout";
  //     }
  // }
  function addDegree() {
    // Create a new div element with the degree class
    var newDegree = document.createElement('div');
    newDegree.className = 'degree';

    // Add input fields for degree name, school name, and year
    newDegree.innerHTML = '<input type="text" name="degree[]" placeholder="Degree Name">' +
      '<input type="text" name="school[]" placeholder="School Name">' +
      '<input type="text" name="year[]" placeholder="Year">';

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
    newCertificate.innerHTML = '<input type="text" name="certificate_title[]" placeholder="Certificate Title">' +
      '<input type="text" name="certificate_organization[]" placeholder="Organization Name">' +
      '<input type="text" name="certificate_year[]" placeholder="Year">' +
      '<input type="text" name="certificate_expiration[]" placeholder="Expiration Date">';

    // Insert the new certificate block after the last certificate block
    var certificates = document.getElementsByClassName('certificate');
    var lastCertificate = certificates[certificates.length - 1];
    lastCertificate.parentNode.insertBefore(newCertificate, lastCertificate.nextSibling);
  }

  function addWork() {
    // Create a new div element with the work class
    var newWork = document.createElement('div');
    newWork.className = 'work';

    // Add input fields for work title, company name, and tasks
    newWork.innerHTML = '<input type="text" name="work_title[]" placeholder="Title">' +
      '<input type="text" name="work_company[]" placeholder="Company Name">' +
      '<textarea name="work_tasks[]" placeholder="Tasks"></textarea>';

    // Insert the new work block after the last work block
    var works = document.getElementsByClassName('work');
    var lastWork = works[works.length - 1];
    lastWork.parentNode.insertBefore(newWork, lastWork.nextSibling);
  }

  function addExperience() {
    // Create a new div element with the experience class
    var newExperience = document.createElement('div');
    newExperience.className = 'experience';

    // Add input fields for experience title, company name, and description
    newExperience.innerHTML = '<input type="text" name="experience_title[]" placeholder="Title">' +
      '<input type="text" name="experience_company[]" placeholder="Company Name">' +
      '<textarea name="experience_description[]" placeholder="Description"></textarea>';

    // Insert the new experience block after the last experience block
    var experiences = document.getElementsByClassName('experience');
    var lastExperience = experiences[experiences.length - 1];
    lastExperience.parentNode.insertBefore(newExperience, lastExperience.nextSibling);
  }

  function addReference() {
    // Create a new div element with the reference class
    var newReference = document.createElement('div');
    newReference.className = 'reference';

    // Add input fields for reference name, phone number, email, and relationship
    newReference.innerHTML = '<input type="text" name="reference_name[]" placeholder="Name">' +
      '<input type="text" name="reference_phone[]" placeholder="Phone Number">' +
      '<input type="text" name="reference_email[]" placeholder="Email">' +
      '<input type="text" name="reference_relationship[]" placeholder="Relationship">';

    // Insert the new reference block after the last reference block
    var references = document.getElementsByClassName('reference');
    var lastReference = references[references.length - 1];
    lastReference.parentNode.insertBefore(newReference, lastReference.nextSibling);
  }


  function myFunction() {
    const show = document.getElementById('profile');
    const lst = document.getElementById('list');
    const button = document.querySelector('header button');
    if (!show.style.display || show.style.display == 'none')
      show.style.display = 'block';
    else
      show.style.display = 'none';

    if (window.innerWidth <= 650 && show.style.display == 'block') {
      lst.style.display = 'none';
      // button.style.margin-right = 'auto';
    }
    else {
      lst.style.display = 'block';
    }
  }
</script>

</html>