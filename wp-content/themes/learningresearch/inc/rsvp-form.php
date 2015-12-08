<header>
    <h2>RSVP</h2>
</header>

<form name="create_contact" id="form" role="form" method="post" action="http://104.236.36.75/catlrcrm/tests/submit.php">
  <div class="btn-group" data-toggle="buttons">
    <label class="active">
      <input type="radio" name="member_status" id="Registered" value="Registered" autocomplete="off" checked> Will attend
    </label>
    <label class="">
      <input type="radio" name="member_status" id="Interested" value="Interested" autocomplete="off"> Interested but can't attend</label>
  </div>
  
  <br /><br />
	
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="@neu.edu or @husky.neu.edu">
  </div>

  <br />

  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name">
  </div>

  <br />

  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last name">
  </div>

  <br />

  <div class="form-group">
    <label for="department">Department</label>
    <?php /* <input type="text" class="form-control" id="department" name="department" placeholder="Department"> */ ?>
    <select class="form-control" id="department" name="department" placeholder="Department">
      <option></option>
      <optgroup label="Co-op">
          <option value="Co-op">Co-op</option>
      </optgroup>
      <optgroup label="BCHS">
          <option value="Communication Sciences and Disorders">Communication Sciences and Disorders</option>
          <option value="Counseling and Applied Educational Psychology">Counseling and Applied Educational Psychology</option>
          <option value="Health Sciences">Health Sciences</option>
          <option value="Nursing">Nursing</option>
          <option value="Pharmaceutical Sciences">Pharmaceutical Sciences</option>
          <option value="Pharmacy and Health System Sciences">Pharmacy and Health System Sciences</option>
          <option value="Physical Therapy">Physical Therapy</option>
          <option value="Physician Assistant">Physician Assistant</option>
          <option value="Pre-Health Program">Pre-Health Program</option>
          <option value="Speech Language Pathology and Audiology">Speech Language Pathology and Audiology</option>
      </optgroup>
      <optgroup label="CAMD">
          <option value="Architecture">Architecture</option>
          <option value="Art + Design">Art + Design</option>
          <option value="Communication Studies">Communication Studies</option>
          <option value="Game Design Program">Game Design Program</option>
          <option value="Journalism">Journalism</option>
          <option value="Landscape Architecture">Landscape Architecture</option>
          <option value="Media and Screen Studies">Media and Screen Studies</option>
          <option value="Music">Music</option>
          <option value="Theatre">Theatre</option>
      </optgroup>
      <optgroup label="CCIS">
          <option value="Computer and Information Science">Computer and Information Science</option>
          <option value="Health Informatics">Health Informatics</option>
          <option value="Information Assurance">Information Assurance</option>
          <option value="Information Systems">Information Systems</option>
      </optgroup>
      <optgroup label="COE">
          <option value="Bioengineering">Bioengineering</option>
          <option value="Chemical Engineering">Chemical Engineering</option>
          <option value="Civil and Environmental Engineering">Civil and Environmental Engineering</option>
          <option value="Electrical and Computer Engineering">Electrical and Computer Engineering</option>
          <option value="First-Year Engineering Program">First-Year Engineering Program</option>
          <option value="Mechanical and Industrial Engineering">Mechanical and Industrial Engineering</option>
      </optgroup>
      <optgroup label="COS">
          <option value="Behavioral Neuroscience">Behavioral Neuroscience</option>
          <option value="Biochemistry">Biochemistry</option>
          <option value="Biology">Biology</option>
          <option value="Biotechnology">Biotechnology</option>
          <option value="Chemistry and Chemical Biology">Chemistry and Chemical Biology</option>
          <option value="Linguistics">Linguistics</option>
          <option value="Marine and Environmental Sciences">Marine and Environmental Sciences</option>
          <option value="Mathematics">Mathematics</option>
          <option value="Physics">Physics</option>
          <option value="Psychology">Psychology</option>
      </optgroup>
      <optgroup label="CPS">
          <option value="CPS">College of Professional Studies</option>
      </optgroup>
      <optgroup label="CSSH">
          <option value="African-American Studies">African-American Studies</option>
          <option value="American Sign Language-English Interpreting">American Sign Language-English Interpreting</option>
          <option value="Asian Studies">Asian Studies</option>
          <option value="Criminology and Criminal Justice">Criminology and Criminal Justice</option>
          <option value="Economics">Economics</option>
          <option value="English">English</option>
          <option value="History">History</option>
          <option value="Human Services">Human Services</option>
          <option value="International Affairs">International Affairs</option>
          <option value="Jewish Studies">Jewish Studies</option>
          <option value="Law and Public Policy">Law and Public Policy</option>
          <option value="Philosophy and Religion">Philosophy and Religion</option>
          <option value="Political Science">Political Science</option>
          <option value="Public Policy and Urban Affairs">Public Policy and Urban Affairs</option>
          <option value="Sociology and Anthropology">Sociology and Anthropology</option>
          <option value="Women's, Gender and Sexuality Studies Program">Women's, Gender and Sexuality Studies Program</option>
      </optgroup>
      <optgroup label="DMSB">
          <option value="Accounting">Accounting</option>
          <option value="Business Administration">Business Administration</option>
          <option value="Entrepreneurship and Innovation">Entrepreneurship and Innovation</option>
          <option value="Finance and Insurance">Finance and Insurance</option>
          <option value="International Business Strategy">International Business Strategy</option>
          <option value="Management and Organizational Development">Management and Organizational Development</option>
          <option value="Marketing">Marketing</option>
          <option value="Supply Chain and Information Management">Supply Chain and Information Management</option>
      </optgroup>
      <optgroup label="LAW">
          <option value="Law">Law</option>
      </optgroup>
      <optgroup label="OTHER">
          <option value="Academic Technology Services">Academic Technology Services</option>
          <option value="Center for Spirtuality, Dialogue and Service">Center for Spirtuality, Dialogue and Service</option>
          <option value="Center of Community Service">Center of Community Service</option>
          <option value="External">External</option>
          <option value="General Studies">General Studies</option>
          <option value="Honors Program">Honors Program</option>
          <option value="NU Global">NU Global</option>
          <option value="OTHER">OTHER</option>
          <option value="Undeclared">Undeclared</option>
          <option value="University Libraries">University Libraries</option>
      </optgroup>
    </select>    
  </div>


  <br />
  <div class="form-group">
    <label for="college">College / Unit</label>
    <select class="form-control" id="college" name="college" placeholder="College">
      <option></option>
      <optgroup label="Colleges">
        <option value="CAMD">College of Arts, Media & Design</option>
        <option value="DMSB">D'Amore-McKim School of Business</option>
        <option value="CCIS">College of Computer & Information Science</option>
        <option value="COE">College of Engineering</option>
        <option value="BCHS">Bouvé College of Health Sciences</option>
        <option value="CPS">College of Professional Studies</option>
        <option value="COS">College of Science</option>
        <option value="CSSH">College of Social Sciences & Humanities</option>
        <option value="Law">School of Law</option>
      </optgroup>
      <optgroup label="Units">
        <option value="Career Services / Co-op">Career Services / Co-op</option>
        <option value="Center of Community Service">Center of Community Service</option>
        <option value="Provost's Office">Provost's Office</option>
        <option value="External">External</option>
        <option value="University Libraries">University Libraries</option>
        <option value="Information Technology Services">Information Technology Services</option>
        <option value="Other">Other</option>
      </optgroup>
    </select>
  </div>

  <br />
  <div class="form-group">
    <label for="rank">Affiliation</label>
    <select class="form-control hide-search" id="rank" name="rank" placeholder="Affiliation">
      <option value="Faculty">Faculty/Staff/Post-doc</option>
  		<option value="Graduate Student">Graduate Student</option>
    </select>
  </div>

  <br />

  <!--
  <div class="form-group">
    <input type="radio" class="form-control" name="member_status" value="Registered" checked> I will attend.
    <br><br>
    <input type="radio" class="form-control" name="member_status" value="Interested"> I'm interested, but I cannot attend
  </div>
  -->

  <button type="submit" class="btn btn-danger">Submit</button>

  <input type="hidden" name="start_date" value="<?php echo get_field('start_date'); ?>">
  <input type="hidden" name="recent_event_url" value="<?php the_permalink(); ?>">
  <input type="hidden" name="event" value="<?php the_title(); ?>">
  <input type="hidden" name="start_time" value="<?php echo get_field('start_time'); ?>">
  <input type="hidden" name="campaign_id" value="<?php echo get_field('registration_id'); ?>">  
</form>


